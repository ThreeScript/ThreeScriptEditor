var tsg = ts_global = {
   aceEditor: {
      editor: null,
      session: null,
      undo_manager: null,
      editing: false,
      changed: false
   },
   tree: {
      selected_data: null,
      selected_content_data: null
   },
   file: {
      runnable: false
   },
   user: {
      data: {
         id: null,
         nickname: null,
         firstname: null,
         lastname: null
      }
   }
};

function prepareEditor() {
   var ae = tsg.aceEditor;
   ae.editor = ace.edit("editor");
   ae.editor.setTheme("ace/theme/twilight");
   ae.session = tsg.aceEditor.editor.getSession();
   ae.undo_manager = tsg.aceEditor.session.getUndoManager();
   ae.session.setMode("ace/mode/javascript");
   onChangeCursor(ae);
   onChangeAnnotation(ae);
}

function onChangeCursor() {
   var ae = tsg.aceEditor;
   ae.session.selection.on("changeCursor", function(e) {
      var c = ae.editor.selection.getCursor();
      if (c) {
         $("#id-status-row-num").html(c.row + 1);
         $("#id-status-col-num").html(c.column + 1);
      }
   });
}
function onChangeAnnotation() {
   var ae = tsg.aceEditor;
   ae.session.on("changeAnnotation", function() {
      var sep = "";
      var annotationStr = "";
      var errorCount = 0;
      var infoWarningCount = 0;
      var annotations = ae.session.getAnnotations();
      for (var key in annotations) {
         var annotation = annotations[key];
         annotationStr += sep + annotation.row;
         if (annotations.hasOwnProperty(key)) {
            if (annotation.type === "error") {
               errorCount++;
            } else if (annotation.type === "info" || annotation.type === "warning") {
               infoWarningCount++;
            }
            // str = str + sep + annotation.text + " (" + nextrow + ")";
            sep = "/";
         }
      }
      $("#id-status-errors").html(errorCount ? errorCount + " error(s)" : "no errors");
      $("#id-status-info-warnings").html(infoWarningCount ? infoWarningCount + " info/warning(s) at" : "no info/warnings");
      $("#id-status-annotations").html(annotationStr);
      ae.changed = !ae.undo_manager.isClean();
      if (ae.changed)
         $("#id-status-save").html("SAVE!");
      else
         $("#id-status-save").html("OK");
   });
}

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
   confirmAndRemove(sel, function(sel, dialogItself) {
      jstree.delete_node(sel);
   });
   return true;
}

function confirmAndRemove(callbackObject, callback) {
   BootstrapDialog.show({
      message: 'Confirm remove file!',
      buttons: [{
            icon: 'glyphicon glyphicon-ban-circle',
            label: 'Confirm. (Are you sure? Click here, so!)',
            cssClass: 'btn-warning',
            action: function(dialogItself) {
               callback(callbackObject, dialogItself);
               dialogItself.close();
            }
         }, {
            label: 'Close',
            action: function(dialogItself) {
               dialogItself.close();
            }
         }]
   });
}

function confirmAndSave(callbackObject, callbackConfirmed, callbackDiscard, callbackCancel) {
   BootstrapDialog.show({
      message: 'Confirm save file!',
      buttons: [{
            icon: 'glyphicon glyphicon-ban-circle',
            label: 'Save file?',
            cssClass: 'btn-info',
            action: function(dialogItself) {
               callbackConfirmed(callbackObject, dialogItself);
               dialogItself.close();
            }
         }, {
            label: 'Discard changes',
            action: function(dialogItself) {
               callbackDiscard(callbackObject, dialogItself);
               dialogItself.close();
            }
         }]
   });
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
            tmp.create.label = tsg.locale.New;
            tmp.create.submenu = {
               "create_folder": {
                  "separator_after": true,
                  "label": tsg.locale.Folder,
                  "action": function(nodeData) {
                     createFolder(nodeData.reference);
                  }
               },
               "create_file": {
                  "label": tsg.locale.File,
                  "action": function(nodeData) {
                     createFile(nodeData.reference);
                  }
               },
               "upload_file": {
                  "label": tsg.locale.Upload,
                  "action": function(nodeData) {
                     $("#file-upload").click();
                  }
               }
            };
            if (this.get_type(node) === "file") {
               delete tmp.create;
            }
            tmp.ccp.label = tsg.locale.Edit;
            tmp.ccp.submenu.copy.label = tsg.locale.Copy;
            tmp.ccp.submenu.cut.label = tsg.locale.Cut;
            tmp.ccp.submenu.paste.label = tsg.locale.Paste;
            if (tmp.create)
               tmp.create.label = tsg.locale.Create;
            tmp.rename.label = tsg.locale.Rename;
            tmp.remove.label = tsg.locale.Remove;
            var previous_remove_action = tmp.remove.action;
            function remove_action(nodeData) {
               confirmAndRemove(nodeData, function(ajaxData, dialogItself) {
                  previous_remove_action(nodeData);
                  dialogItself.close();
               });
            }
            tmp.remove.action = remove_action;
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
   }).on('delete_node.jstree', function(e, nodeData) {
      $.get('?operation=delete_node', {'id': nodeData.node.id}).fail(function() {
         nodeData.instance.refresh();
      });
   }).on('create_node.jstree', function(e, nodeData) {
      $.get('?operation=create_node', {'type': nodeData.node.type, 'id': nodeData.node.parent, 'text': nodeData.node.text})
              .done(function(content_data) {
         nodeData.instance.set_id(nodeData.node, content_data.id);
      }).fail(function() {
         nodeData.instance.refresh();
      });
   }).on('rename_node.jstree', function(e, nodeData) {
      switch (nodeData.old) {
         case 'help':
         case 'examples':
         case 'users':
            nodeData.text = nodeData.old;
            break;
      }
      $.get('?operation=rename_node', {'id': nodeData.node.id, 'text': nodeData.text}).done(function(content_data) {
         nodeData.instance.set_id(nodeData.node, content_data.id);
         tsg.tree.selected_data = nodeData;
      }).fail(function() {
         nodeData.instance.refresh();
      });
   }).on('move_node.jstree', function(e, nodeData) {
      $.get('?operation=move_node', {'id': nodeData.node.id, 'parent': nodeData.parent}).done(function(content_data) {
         nodeData.instance.refresh();
      }).fail(function() {
         nodeData.instance.refresh();
      });
   }).on('copy_node.jstree', function(e, nodeData) {
      $.get('?operation=copy_node', {'id': nodeData.original.id, 'parent': nodeData.parent})
              .done(function(content_data) {
         nodeData.instance.refresh();
      }).fail(function() {
         nodeData.instance.refresh();
      });
   }).on('changed.jstree', function(e, nodeData) {
      if (tsg.aceEditor.editing && tsg.aceEditor.changed) {
         confirmAndSave(nodeData,
                 function() {
                    saveFile(
                            function() {
                               changeNode(nodeData);
                               $("#id-status-save").html("OK");
                            },
                            function() {
                               changeNode(nodeData);
                               $("#id-status-save").html("ERROR");
                            });
                 },
                 function() {
                    changeNode(nodeData);
                 },
                 function() {
                 });
      } else {
         changeNode(nodeData);
         $("#id-status-save").html("OK");
      }
   });
}

function disableButtons() {
   $("#btn-save").css("display", "none");
   $("#btn-run").css("display", "none");
   $("#btn-new-folder").css("display", "none");
   $("#btn-new-file").css("display", "none");
   $("#btn-rename").css("display", "none");
   $("#btn-remove").css("display", "none");
   $("#btn-upload").css("display", "none");
}

function enableButtons(node) {
   if (node.type === "js") {
      $("#btn-run").css("display", "block");
   }
   if (!node.data.readonly) {
      $("#btn-rename").css("display", "block");
      $("#btn-remove").css("display", "block");
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

function submitForm(formId, inputOperation, inputValue) {
   var form = $("#" + formId);
   var input = $("#" + inputOperation);
   if (inputOperation)
      input.val(inputValue);
   form.submit();
}

function buttonsClick() {
   $("#btn-run").click(function(e) {
      $("#userid").val(tsg.user.data.id);
      $("#nickname").val(tsg.user.data.nickname);
      $("#filename").val(tsg.tree.selected_data.node.id);
      submitForm("form-run");
   });

   $("#btn-save").click(function(e) {
      saveFile(
              function() {
                 $("#id-status-save").html("SAVED");
                  tsg.aceEditor.changed = false;
                  tsg.aceEditor.undo_manager.markClean();
                  $("#id-status-save").html("OK");
              },
              function() {
                 $("#id-status-save").html("ERROR");
              });
   });

   $("#btn-new-folder").click(function(e) {
      btnCreateFolderOrFile(createFolder);
   });

   $("#btn-new-file").click(function(e) {
      btnCreateFolderOrFile(createFile);
   });

   $("#btn-remove").click(function(e) {
      btnRemoveFolderOrFile();
   });

   $("#btn-rename").click(function(e) {
      btnRenameFolderOrFile();
   });

   $("#btn-upload").click(function(e) {
   });

   $("#signin").click(function(e) {
      submitForm("form-signin", "operation", "signin");
      /*
       var form = $("#form-signin");
       var input = $("#operation");
       input.val("signin");
       form.submit();
       */
   });

   $("#signout").click(function() {
      submitForm("form-signout", "operation", "signout");
      /*
       var form = $("#form-signout");
       var input = $("#operation");
       input.val("signout");
       form.submit();
       */
   });

   $("#register").click(function() {
      submitForm("form-signin", "operation", "register");
      /*
       var form = $("#form-signin");
       var input = $("#operation");
       input.val("register");
       form.submit();
       */
   });
}

function saveFile(sucessCallback, errorCallback) {
   $.ajax({
      url: "save.php",
      method: "POST",
      dataType: "json",
      data: {
         user: tsg.user.data.nickname,
         fileid: tsg.tree.selected_data.node.id,
         txt: tsg.aceEditor.editor.getValue()
      },
      success: function(data) {
         if (sucessCallback) {
            tsg.aceEditor.changed = false;
            sucessCallback(data);
         }
      },
      error: function(data) {
         if (errorCallback) {
            errorCallback(data);
         }
      }
   });
}

$(function() {
   $(window).resize(function() {
   }).resize();

   prepareTree();

   disableButtons();

   prepareEditor(tsg.aceEditor);

   buttonsClick();

   var form;

   $('#file-upload').change(function(event) {
      var form = new FormData();
      if (tsg.tree.selected_data)
         form.append('folder', tsg.tree.selected_data.node.id);
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
               if (tsg.tree.selected_data)
                  tsg.tree.selected_data.instance.refresh();
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

function changeNode(nodeData) {
   disableButtons();
   if (nodeData && nodeData.selected && nodeData.selected.length) {
      tsg.tree.selected_data = nodeData;
      $.get('?operation=get_content&id=' + nodeData.selected.join(':'), function(content_data) {
         tsg.tree.selected_content_data = content_data;
         tsg.aceEditor.editing = false;
         tsg.aceEditor.changed = false;
         $("#id-status-save").html("OK");
         tsg.aceEditor.undo_manager.markClean();
         enableButtons(content_data);
         $("#id-status-tree").html(nodeData.selected);
         if (content_data && typeof content_data.type !== 'undefined') {
            $('#data .content').hide();
            switch (content_data.type) {
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
                  tsg.aceEditor.editing = true;
                  tsg.aceEditor.session.setValue(content_data.content);
                  tsg.aceEditor.editor.setReadOnly(content_data.data.readonly);
                  break;
               case 'png':
               case 'jpg':
               case 'jpeg':
               case 'bmp':
               case 'gif':
                  $('#data .image img').one('load', function() {
                     $(this).css({'marginTop': '-' + $(this).height() / 2 + 'px', 'marginLeft': '-' + $(this).width() / 2 + 'px'});
                  }).attr('src', content_data.content);
                  $('#data .image').show();
                  break;
               case 'htm':
                  $('#data .default').html(content_data.content).show();
                  break;
               default:
                  $('#data .default').html(content_data.content).show();
                  break;
            }
         }
      });
   }
   else {
      $('#data .content').hide();
      $('#data .default').html('Select a file from the tree.').show();
   }
}

function compileCode() {
   try {
      var result = iframeWindow.eval(code);
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

// http://dean.edwards.name/weblog/2006/11/sandbox/
