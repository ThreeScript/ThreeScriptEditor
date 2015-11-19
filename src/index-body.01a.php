<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Threescriptor</title>
      <meta name="viewport" content="width=device-width" />

      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>

      <script src="/oslib/js/ace.c9.com/ace-builds.2.2.0/src-noconflict/ace.js" charset="utf-8"></script>

      <script src="/oslib/js/jstree/3.2.1/dist/jstree.min.js"></script>
      <link href="/oslib/js/jstree/3.2.1/dist/themes/default/style.min.css" rel="stylesheet" />

      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/buttons.css" />

      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>

      <?
      $threescriptorJs = $threescriptEditorSrcDir . "/threescriptor.01a.js";
      $threescriptorCss = $threescriptEditorSrcDir . "/threescriptor.01a.css";
      echo "<script src='$threescriptorJs'></script>";
      echo "<link href='$threescriptorCss' rel='stylesheet'>";
      ?>
   </head>
   <body>
      <script>
         window.fbAsyncInit = function() {
            FB.init({
               appId: '975584632501298',
               xfbml: true,
               version: 'v2.5'
            });
         };

         (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
               return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>      
      <!-- reincorporate -- script>
         window.fbAsyncInit = function() {
            FB.init({
               appId: '909924852377111',
               xfbml: true,
               version: 'v2.5'
            });
         };

         (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
               return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script-->
      <script>
         var session_userid = "<?= $userid ?>";
         var session_nickname = "<?= $nickname ?>";
         var session_firstname = "<?= $firstname ?>";
         var session_lastname = "<?= $lastname ?>";
         var session_email = "<?= $email ?>";
         var tstrans = {
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
      <div id="panel-top">
         <div id='logo' class='top-div-item'>
            <div id='logo-ts' class='pr'>
               <div class='t' style='font-size: 46px;'>t</div><div class='s'>s</div>
            </div>
            <div id='logo-threescript' class='pr'>
               <div class='t'>three</div><div class='s'>script</div>
            </div>
         </div>
         <div class='top-div-item' style='left: -147px; top: 28px;'>
            r72.1
         </div>
         <div class='top-div-item' style='position: relative; left: -147px; top: 9px;'>
            <?php
            if (isset($userid)) {
               echo "<form id='form-signout' action='signin.php' method='post'>";
               echo ("<div class='top-div-item'>$firstname</div>");
               echo "<input id='operation' type='hidden' name='operation'></input>";
               echo "<div class='top-div-item button button-primary button-tiny'>
                  <a id='signout' href='#'>" . _("Sign Out") . "</a></div>";
               echo "</form>";
            } else {
               echo "<form id='form-signin' action='signin.php' method='post'>";
               echo "<input id='operation' type='hidden' name='operation'></input>";
               echo "<div class='top-div-item'>" . _("Nickname or Email") . "</div>";
               echo "<div class='top-div-item'><input type='text' name='nickname_or_email'></input></div>";
               echo "<div class='top-div-item'>" . _("Password") . "</div>";
               echo "<div class='top-div-item'><input type='password' name='password'></input></div>";
               echo "<div class='top-div-item button button-primary button-tiny'>
                  <a id='signin' href='#'>" . _("Sign In") . "</a></div>";
               echo "<div class='top-div-item button button-primary button-tiny'>
                  <a id='register' href='#'>" . _("Register") . "</a></div>";
               echo "</form>";
            }
            ?>
         </div>
      </div>
      <div id="panel-container" role="main">
         <div id="panel-container-tree">
            <div id="tree"></div>
            <div id="tree-status">
               <div id="tree-status-1" class="bgs abs0000">
               </div>
            </div>
         </div>
         <div id="panel-container-data">
            <div id="data">
               <div class="content code abs0000 dn">
                  <pre id="editor" class="abs0000">
                  </pre>
               </div>
               <div class="content folder abs0000 dn">               
               </div>
               <div class="content image abs0000 dn">
                  <img src="" alt="" class="abs0000" 
                       style="display:block; position:absolute; 
                       left:50%; top:50%; padding:0; 
                       max-height:90%; max-width:90%;" />
               </div>
               <div class="content default abs0000" style="text-align:center;">
                  <?= _("Select a file from the tree."); ?>
               </div>
            </div>
            <div id="data-status">
               <div id="data-status-1" class="bgs fl ml5 abs0000" style="right: 40px; ">
               </div>
               <div id="data-status-2" class="bgs fl ml5 abs0000" style="left: 45px; right: 90px;">
               </div>
               <div id="data-status-3" class="bgs fl ml5 abs0000" style="left: 95px;">
               </div>
            </div>
         </div>
      </div>
      <div id="panel-bottom">
         <form id="form-upload" action="#" enctype="multipart/form-data" >
            <!--a id="upload" href="#" class="fl button button-primary button-small">Upload</a-->
            <input id="file-upload" name="file-upload" type="file" class="button button-primary button-small" style="display: none"/>
         </form>
         <form id="form-run" action="run.php" method="post" target="_blank">
            <input id="userid" name="userid" type="hidden" value=""/>
            <input id="nickname" name="nickname" type="hidden" value=""/>
            <input id="filename" name="filename" type="hidden" value=""/>
         </form>
         <a id="btn-run" href="#" class="fl ml5 button button-primary button-small"><? echo _("Run"); ?></a>
         <a id="btn-save" href="#" class="fl ml5 button button-primary button-small"><? echo _("Save"); ?></a>
         <a id="btn-new-folder" href="#" class="fl ml5 button button-primary button-small"><? echo _("New Folder"); ?></a>
         <a id="btn-new-file" href="#" class="fl ml5 button button-primary button-small"><? echo _("New File"); ?></a>
         <a id="btn-rename" href="#" class="fl ml5 button button-primary button-small"><? echo _("Rename"); ?></a>
         <a id="btn-delete" href="#" class="fl ml5 button button-primary button-small"><? echo _("Delete"); ?></a>
         <a id="btn-upload" href="#" class="fl ml5 button button-primary button-small"><? echo _("Upload"); ?></a>
      </div>
   </body>
</html>
