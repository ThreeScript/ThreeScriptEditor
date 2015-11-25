// var selectedDataNodeId = null;
var selectedData = null;
var editor = null;
var editor_session = null;

function createFile(reference) {
   var inst = $.jstree.reference(reference);
   var obj = inst.get_node(reference);
   inst.create_node(obj, {type: "file"}, "last", function(new_node) {
      setTimeout(function() {
         inst.edit(new_node);
      }, 0);
   });
}

function createFolder(reference) {
   var inst = $.jstree.reference(reference);
   var obj = inst.get_node(reference);
   inst.create_node(obj, {type: "default"}, "last", function(new_node) {
      setTimeout(function() {
         inst.edit(new_node);
      }, 0);
   });
}

function btnCreateFolderOrFile(create_function) {
   var jstree = $('#tree').jstree(true);
   if (!jstree)
      return false;
   var sel = jstree.get_selected();
   if (!sel.length)
      return false;
   create_function(sel[0]);
   return true;
}

function btnRenameFolderOrFile() {
   var jstree = $('#tree').jstree(true);
   if (!jstree)
      return false;
   var sel = jstree.get_selected();
   if (!sel.length)
      return false;
   sel = sel[0];
   jstree.edit(sel);
   return true;
}

function btnRemoveFolderOrFile() {
   var jstree = $('#tree').jstree(true);
   if (!jstree)
      return false;
   var sel = jstree.get_selected();
   if (!sel.length)
      return false;
   jstree.delete_node(sel);
   return true;
}

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
            if (node.id === "users" || node.id === "examples" || node.id === 'help')
               return false;
            var readonly;
            if (node.data)
               readonly = node.data.readonly;
            else
               readonly = (node.parent.substring(0, 5) !== "users");
            if (readonly)
               return false;
            var tmp = $.jstree.defaults.contextmenu.items();
            delete tmp.create.action;
            tmp.create.label = tstrans.New;
            tmp.create.submenu = {
               "create_folder": {
                  "separator_after": true,
                  "label": tstrans.Folder,
                  "action": function(data) {
                     createFolder(data.reference);
                  }
               },
               "create_file": {
                  "label": tstrans.File,
                  "action": function(data) {
                     createFile(data.reference);
                  }
               },
               "upload_file": {
                  "label": tstrans.Upload,
                  "action": function(data) {
                     $("#file-upload").click();
                  }
               }
            };
            if (this.get_type(node) === "file") {
               delete tmp.create;
            }
            tmp.ccp.label = tstrans.Edit;
            tmp.ccp.submenu.copy.label = tstrans.Copy;
            tmp.ccp.submenu.cut.label = tstrans.Cut;
            tmp.ccp.submenu.paste.label = tstrans.Paste;
            if (tmp.create)
               tmp.create.label = tstrans.Create;
            tmp.rename.label = tstrans.Rename;
            tmp.remove.label = tstrans.Remove;
            var previous_remove_action = tmp.remove.action;
            tmp.remove.action = function(data) {
               BootstrapDialog.show({
                  message: 'Confirme remove file!',
                  buttons: [{
                     icon: 'glyphicon glyphicon-ban-circle',
                     label: 'Confirm. (Are you sure? Click here, so!)',
                     cssClass: 'btn-warning',
                     action: function() {
                        previous_remove_action(data);
                        dialogItself.close();
                     }
                  }, {
                     label: 'Close',
                     action: function(dialogItself) {
                        dialogItself.close();
                     }
                  }]
               });
            };
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
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('move_node.jstree', function(e, data) {
      $.get('?operation=move_node', {'id': data.node.id, 'parent': data.parent}).done(function(d) {
         data.instance.refresh();
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('copy_node.jstree', function(e, data) {
      $.get('?operation=copy_node', {'id': data.original.id, 'parent': data.parent})
              .done(function(d) {
         data.instance.refresh();
      }).fail(function() {
         data.instance.refresh();
      });
   }).on('changed.jstree', function(e, data) {
      disableButtons();
      if (data && data.selected && data.selected.length) {
         selectedData = data;
         $.get('?operation=get_content&id=' + data.selected.join(':'), function(d) {
            enableButtons(d);
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
                     editor.getSession().setValue(d.content);
                     // editor.gotoLine(1);
                     // editor.getSession().getUndoManager().reset();
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

function disableButtons() {
   $("#btn-save").css("display", "none");
   $("#btn-run").css("display", "none");
   $("#btn-new-folder").css("display", "none");
   $("#btn-new-file").css("display", "none");
   $("#btn-rename").css("display", "none");
   $("#btn-delete").css("display", "none");
   $("#btn-upload").css("display", "none");
}

function enableButtons(node) {
   if (node.type === "js") {
      $("#btn-run").css("display", "block");
   }
   if (!node.data.readonly) {
      $("#btn-rename").css("display", "block");
      $("#btn-delete").css("display", "block");
      if (node.type === "js") {
         $("#btn-save").css("display", "block");
      }
      if ((node.type === "folder")) {
         $("#btn-new-folder").css("display", "block");
         $("#btn-new-file").css("display", "block");
         $("#btn-upload").css("display", "block");
      }
   }
}

$(function() {
   $(window).resize(function() {
      // var h = Math.max($("#container-parent").height() - 0, 420);
      // $('#container, #data, #tree, #data .content').height(h).filter('.default').css('lineHeight', h + 'px');
   }).resize();

   prepareTree();

   disableButtons();

   editor = ace.edit("editor");
   editor.setTheme("ace/theme/twilight");
   editor_session = editor.getSession();
   editor_session.setMode("ace/mode/javascript");
   editor_session.on("changeAnnotation", function() {
      var annot = editor.getSession().getAnnotations();
      var lines = "";
      var str = "";
      var sep = "";
      var num = 0;
      for (var key in annot) {
         if (annot.hasOwnProperty(key)) {
            lines = lines + sep + (annot[key].row + 1);
            str = str + sep + annot[key].text + " (" + annot[key].row + ")";
            sep = "/";
            num++;
         }
      }
      if (num) {
         $("#data-status-1").html("errors");
         $("#data-status-2").html(num);
         $("#data-status-3").html(lines);
      }
      else {
         $("#data-status-1").html("ok");
         $("#data-status-2").html("");
         $("#data-status-3").html("");
      }
   });

   $("#btn-run").click(function(e) {
      var form = $("#form-run");
      $("#nickname").val(session_nickname);
      $("#userid").val(session_userid);
      $("#filename").val(selectedData.node.id);
      form.submit();
   });

   $("#btn-save").click(function(e) {
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

   $("#btn-new-folder").click(function(e) {
      btnCreateFolderOrFile(createFolder);
   });

   $("#btn-new-file").click(function(e) {
      btnCreateFolderOrFile(createFile);
   });

   $("#btn-delete").click(function(e) {
      btnRemoveFolderOrFile();
   });

   $("#btn-rename").click(function(e) {
      btnRenameFolderOrFile();
   });

   $("#btn-upload").click(function(e) {
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

function compileCode() {
   try {
      var result = iframeWindow.eval(code)
   } catch (e) {
      alert(e.message());
   }
}

function compileCode2() {
   // grabbed from http://stackoverflow.com/questions/6432984/adding-script-element-to-the-dom-and-have-the-javascript-run
   var script = document.createElement('script');
   try {
      script.appendChild(document.createTextNode(code));
      document.body.appendChild(script);
   } catch (e) {
      script.text = code;
      document.body.appendChild(script);
   }
}
