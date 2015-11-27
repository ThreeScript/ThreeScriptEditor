<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>TS Editor</title>
      <meta name="viewport" content="width=device-width" />
      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
      <link href="/oslib/js/jstree/3.2.1/dist/themes/default/style.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/buttons.css" />
      <?= "<link href='$threescriptEditorSrcDir/editor/ts-editor.css' rel='stylesheet'>"; ?>      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
   </head>
   <body>
      <script>
<?= "
         var d = tsg.user.data = {
            id: '$userid',
            nickname: '$nickname',
            firstname: '$firstname',
            lastname: '$lastname',
            email: '$email'
         };";
?>
         tsg.locale = {
            New: "<?= _("New"); ?>",
            Folder: "<?= _("Folder"); ?>",
            File: "<?= _("File"); ?>",
            Edit: "<?= _("Edit"); ?>",
            Create: "<?= _("Create"); ?>",
            Rename: "<?= _("Rename"); ?>",
            Delete: "<?= _("Delete"); ?>",
            Remove: "<?= _("Remove"); ?>",
            Copy: "<?= _("Copy"); ?>",
            Cut: "<?= _("Cut"); ?>",
            Paste: "<?= _("Paste"); ?>",
            Upload: "<?= _("Upload"); ?>"
         };
      </script>
      <div id="panel-threescript" class="panel-default">
         <div id="panel-top"  class="panel-heading">
            <div id='logo' class='top-div-item'>
               <img src='/img/ts/logo/logo.01a.127x33.png'>
            </div>
            <div id='id-release' class='top-div-item'>
               r72.1
            </div>
            <div class='top-div-item' style='top: 9px;'>
               <?php
               if (isset($userid)) {
                  echo "
                     <form id='form-signout' action='?auth' method='post'>
                     <div class='top-div-item'>$firstname</div>
                     <input id='operation' type='hidden' name='operation'></input>
                     <div class='top-div-item button button-primary button-tiny'>
                     <a id='signout' href='#'>" . _("Sign Out") . "</a></div>
                  </form>";
               } else {
                  echo "
                     <form id='form-signin' action='?' method='post'>
                     <input 'hidden' name='auth'>
                     <input id='operation' type='hidden' name='operation'></input>
                     <div class='top-div-item'>" . _("Nickname or Email") . "</div>
                     <div class='top-div-item'><input type='text' name='nickname_or_email'></input></div>
                     <div class='top-div-item'>" . _("Password") . "</div>
                     <div class='top-div-item'><input type='password' name='password'></input></div>
                     <div class='top-div-item button button-primary button-tiny'>
                     <a id='signin' href='#'>" . _("Sign In") . "</a></div>
                     <div class='top-div-item button button-primary button-tiny'>
                     <a id='register' href='#'>" . _("Register") . "</a></div>
                     </form>";
               }
               ?>
            </div>
         </div>
         <div id="panel-container"  class="panel-body" role="main">
            <div id="panel-container-tree" class="panel-default">
               <div id="tree" class="panel-body"></div>
               <div id="tree-status" class="panel-footer">
                  <div id="id-status-tree" class="status-item abs0000">
                  </div>
               </div>
            </div>
            <div id="panel-container-data" class="panel-default">
               <div id="data" class="panel-body">
                  <div class="content code abs0000 dn">
                     <pre id="editor" class="abs0000" style="position: absolute">
                     </pre>
                  </div>
                  <div class="content folder abs0000 dn">               
                  </div>
                  <div class="content image abs0000 dn">
                     <img src="" alt="" class="abs0000x" 
                          style="display:block; position:absolute; 
                          left:50%; top:50%; padding:0; 
                          max-height:90%; max-width:90%;" />
                  </div>
                  <div class="content default abs0000" style="text-align:center;">
                     <?= _("Select a file from the tree."); ?>
                  </div>
               </div>
               <div id="data-status" class="panel-footer">
                  <div id="id-status-save" class="status-item" style="width: 50px; ">
                  </div>
                  <div id="id-status-row" class="status-item" style="width: 30px; ">
                     row
                  </div>
                  <div id="id-status-row-num" class="status-item" style="width: 35px; ">
                  </div>
                  <div id="id-status-col" class="status-item" style="width: 30px; ">
                     col
                  </div>
                  <div id="id-status-col-num" class="status-item" style="width: 35px; ">
                  </div>
                  <div id="id-status-errors" class="status-item" style="width: 60px">
                  </div>
                  <div id="id-status-info-warnings" class="status-item" style="width: 110px;">
                  </div>
                  <div id="id-status-annotations" class="status-item" style="width: 200px;">
                  </div>
               </div>
            </div>
         </div>
         <div id="panel-bottom" class="panel-footer">
            <form id="form-upload" action="#" enctype="multipart/form-data" >
               <!--a id="upload" href="#" class="fl button button-primary button-small">Upload</a-->
               <input id="file-upload" name="file-upload" type="file" class="button button-primary button-small" style="display: none"/>
            </form>
            <form id="form-run" action="?run" method="post" target="_blank">
               <input id="userid" name="userid" type="hidden" value=""/>
               <input id="nickname" name="nickname" type="hidden" value=""/>
               <input id="filename" name="filename" type="hidden" value=""/>
            </form>
            <a id="btn-run" href="#" class="fl ml5 button button-primary button-small"><? echo _("Run"); ?></a>
            <a id="btn-save" href="#" class="fl ml5 button button-primary button-small"><? echo _("Save"); ?></a>
            <a id="btn-new-folder" href="#" class="fl ml5 button button-primary button-small"><? echo _("New Folder"); ?></a>
            <a id="btn-new-file" href="#" class="fl ml5 button button-primary button-small"><? echo _("New File"); ?></a>
            <a id="btn-rename" href="#" class="fl ml5 button button-primary button-small"><? echo _("Rename"); ?></a>
            <a id="btn-remove" href="#" class="fl ml5 button button-primary button-small"><? echo _("Delete"); ?></a>
            <a id="btn-upload" href="#" class="fl ml5 button button-primary button-small"><? echo _("Upload"); ?></a>
         </div>
      </div>
      <?= "<script src='$threescriptEditorSrcDir/google/ts-analytics.js'></script>" ?>
      <script src="/oslib/js/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="/oslib/js/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="/oslib/js/bootstrap3-dialog/1.34.6/dist/js/bootstrap-dialog.js"></script>
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <script src="/oslib/js/jstree/3.2.1/dist/jstree.min.js"></script>
      <script src="/oslib/js/ace.c9.com/ace-builds.2.2.0/src-noconflict/ace.js" charset="utf-8"></script>
      <?
      echo "<script src='$threescriptEditorSrcDir/editor/ts-editor.js'></script>";
      $useFacebook = false;
      if ($useFacebook) {
         echo "<script src='$threescriptEditorSrcDir/ts-facebook.js'></script>";
      }
      ?>
   </body>
</html>

