// var selectedDataNodeId = null;
var selectedData = null;

function prepareTree() {

   var three = $('#tree');
   three.jstree({
      'core': {
         'data': {
            'url': '?operation=get_node',
            'data': function(node) {
               return {'id': node.id};
            }
         },
         'check_callback': function(o, n, p, i, m) {
            if (m && m.dnd && m.pos !== 'i') {
               return false;
            }
            if (o === "move_node" || o === "copy_node") {
               if (this.get_node(n).parent === this.get_node(p).id) {
                  return false;
               }
            }
            return true;
         },
         'force_text': true,
         'themes': {
            'responsive': false,
            'variant': 'small',
            'stripes': true
         }
      },
      'sort': function(a, b) {
         return this.get_type(a) === this.get_type(b) ? (this.get_text(a) > this.get_text(b) ? 1 : -1) : (this.get_type(a) >= this.get_type(b) ? 1 : -1);
      },
      'contextmenu': {
         'items': function(node) {
            if (node.id === "users" || node.id === "examples" || node.id === 'help') {
               return;
            }
            var tmp = $.jstree.defaults.contextmenu.items();
            delete tmp.create.action;
            tmp.create.label = "New";
            tmp.create.submenu = {
               "create_folder": {
                  "separator_after": true,
                  "label": "Folder",
                  "action": function(data) {
                     var inst = $.jstree.reference(data.reference);
                     var obj = inst.get_node(data.reference);
                     inst.create_node(obj, {type: "default"}, "last", function(new_node) {
                        setTimeout(function() {
                           inst.edit(new_node);
                        }, 0);
                     });
                  }
               },
               "create_file": {
                  "label": "File",
                  "action": function(data) {
                     var inst = $.jstree.reference(data.reference);
                     var obj = inst.get_node(data.reference);
                     inst.create_node(obj, {type: "file"}, "last", function(new_node) {
                        setTimeout(function() {
                           inst.edit(new_node);
                        }, 0);
                     });
                  }
               },
               "upload_file": {
                  "label": "Upload",
                  "action": function(data) {
                     $("#file-upload").click();
                  }
               }
            };
            if (this.get_type(node) === "file") {
               delete tmp.create;
            }
            return tmp;
         }
      },
      'types': {
         'default': {'icon': 'folder'},
         'file': {'valid_children': [], 'icon': 'file'}
      },
      'unique': {
         'duplicate': function(name, counter) {
            return name + ' ' + counter;
         }
      },
      'plugins': ['state', 'dnd', 'sort', 'types', 'contextmenu', 'unique']
   }).on('delete_node.jstree', function(e, data) {
      $.get('?operation=delete_node', {'id': data.node.id}).fail(function() {
         data.instance.refresh();
      });
   }).on('create_node.jstree', function(e, data) {
      $.get('?operation=create_node', {'type': data.node.type, 'id': data.node.parent, 'text': data.node.text})
              .done(function(d) {
         data.instance.set_id(data.node, d.id);
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('rename_node.jstree', function(e, data) {
      if (data.old === 'help')
         data.text = 'help';
      if (data.old === 'examples')
         data.text = 'examples';
      if (data.old === 'users')
         data.text = 'users';
      $.get('?operation=rename_node', {'id': data.node.id, 'text': data.text}).done(function(d) {
         data.instance.set_id(data.node, d.id);
         selectedData = data;
         // selectedDataNodeId = data.node.id;
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('move_node.jstree', function(e, data) {
      $.get('?operation=move_node', {'id': data.node.id, 'parent': data.parent}).done(function(d) {
         //data.instance.load_node(data.parent);
         data.instance.refresh();
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('copy_node.jstree', function(e, data) {
      $.get('?operation=copy_node', {'id': data.original.id, 'parent': data.parent})
              .done(function(d) {
         //data.instance.load_node(data.parent);
         data.instance.refresh();
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('changed.jstree', function(e, data) {
      if (data && data.selected && data.selected.length) {
         selectedData = data;
         // selectedDataNodeId = data.node.id;
         $.get('?operation=get_content&id=' + data.selected.join(':'), function(d) {
            if (d && typeof d.type !== 'undefined') {
               $('#data .content').hide();
               switch (d.type) {
                  case 'text':
                  case 'txt':
                  case 'md':
                  case 'htaccess':
                  case 'log':
                  case 'sql':
                  case 'php':
                  case 'js':
                  case 'json':
                  case 'css':
                  case 'html':
                     $('#data .code').show();
                     editor.setValue(d.content);
                     editor.gotoLine(1);
                     break;
                  case 'png':
                  case 'jpg':
                  case 'jpeg':
                  case 'bmp':
                  case 'gif':
                     $('#data .image img').one('load', function() {
                        $(this).css({'marginTop': '-' + $(this).height() / 2 + 'px', 'marginLeft': '-' + $(this).width() / 2 + 'px'});
                     }).attr('src', d.content);
                     $('#data .image').show();
                     break;
                  case 'htm':
                     $('#data .default').html(d.content).show();
                     break;
                  default:
                     $('#data .default').html(d.content).show();
                     break;
               }
            }
         });
      }
      else {
         $('#data .content').hide();
         $('#data .default').html('Select a file from the tree.').show();
      }
   });
}

var editor = null;

$(function() {
   $(window).resize(function() {
      var h = Math.max($(window).height() - 0, 420);
      $('#container, #data, #tree, #data .content').height(h).filter('.default').css('lineHeight', h + 'px');
   }).resize();

   prepareTree();

   editor = ace.edit("editor");
   editor.setTheme("ace/theme/twilight");
   editor.getSession().setMode("ace/mode/javascript");

   $("#save").click(function(e) {
      $.ajax({
         url: "save.php",
         method: "POST",
         dataType: "json",
         data: {
            user: session_nickname,
            fileid: selectedData.node.id,
            txt: editor.getValue()
         },
         success: function(data) {
         },
         error: function(err) {
            alert(err.responseText);
         }
      });
   });

   $("#run").click(function(e) {
      var form = $("#form-run");
      $("#nickname").val(session_nickname);
      $("#userid").val(session_userid);
      $("#filename").val(selectedData.node.id);
      form.submit();
   });

   $("#signin").click(function(e) {
      var form = $("#form-signin");
      var input = $("#operation");
      input.val("signin");
      form.submit();
   });

   $("#signout").click(function(e) {
      var form = $("#form-signout");
      var input = $("#operation");
      input.val("signout");
      form.submit();
   });

   $("#register").click(function(e) {
      var form = $("#form-signin");
      var input = $("#operation");
      input.val("register");
      form.submit();
   });

   var form;

   $('#file-upload').change(function(event) {
      form = new FormData();
      if (selectedData)
         form.append('folder', selectedData.node.id);
      form.append('userfile', event.target.files[0]); // para apenas 1 arquivo
      upload(form);
   });

   $('#send-upload').click(function() {
      upload(form);
   });

   $("#upload").click(function(e) {
      $("#form-upload").submit();
   });

   function upload(formData) {
      $.ajax({
         url: "upload-file.01a.php",
         type: 'POST',
         data: formData,
         success: function(result) {
            if (result.error) {
               alert(result.msg);
            } else {
               if (selectedData)
                  selectedData.instance.refresh();
            }
         },
         cache: false,
         contentType: false,
         processData: false,
         xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
               myXhr.upload.addEventListener('progress', function() {
                  /* faz alguma coisa durante o progresso do upload */
               }, false);
            }
            return myXhr;
         }
      });
   }

   $("#form-upload").submit(function() {
      var formData = new FormData(this);
      upload(formData);
   });

   $('#data .code').show();
});
