<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>TS Editor</title>
      <meta name="viewport" content="width=device-width" />
      <meta name="keywords" content="3D, Threejs, Javascript, Scene, Camera, Renderer">
      <meta name="author" content="Roberto Plácido Teixeira & Ivan de Moura Miranda">
      <meta property="og:title" content="ThreeScript" />
      <meta property="og:site_name" content="ThreeScript" />
      <meta property="og:type" content="article" />
      <meta property="og:description" content="ThreeScript is an amazing opensource project for 3D creation."/>
      <meta property="og:url" content="http://threescript.com" />
      <meta property="og:image" content="http://threescript.com/img/ts/logo/logo.02a.673x317.png" />      
      <meta property="og:app_id" content="975584632501298" />      
      <meta property="og:locale" content="en_US" />            <!-- Default -->
      <meta property="og:locale:alternate" content="pt_BR" />  <!-- French -->
      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
      <link href="/oslib/js/jstree/3.2.1/dist/themes/default/style.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/buttons.css" />
      <?= "<link href='$threescriptEditorSrcDir/editor/ts-editor.css' rel='stylesheet'>"; ?>      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <?= "<script src='$threescriptEditorSrcDir/google/ts-analytics.js'></script>" ?>
      <script src="/oslib/js/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="/oslib/js/bootstrap3-dialog/1.34.6/dist/js/bootstrap-dialog.js"></script>
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <script src="/oslib/js/jstree/3.2.1/dist/jstree.min.js"></script>
      <script src="/oslib/js/ace.c9.com/ace-builds.2.2.0/src-noconflict/ace.js" charset="utf-8"></script>
      <?
      echo "<script src='$threescriptEditorSrcDir/editor/ts-editor.js'></script>";
      echo "<script src='$threescriptEditorSrcDir/crypt/ts-crypt.js'></script>";
      $useFacebook = false;
      if ($useFacebook) {
         echo "<script src='$threescriptEditorSrcDir/ts-facebook.js'></script>";
      }
      ?>
   </head>
   <body>
      <script>
<?= "
         var ___ts_userdata = {
            id: '$userid',
            nickname: '$nickname',
            firstname: '$firstname',
            lastname: '$lastname'
         };";
?>
         var ___ts_locale = {
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
      <!--div id="panel-threescript" class="panel-default_vaimorre "-->
      <!--nav class="navbar navbar-default"-->
      <div id="panel-top"  class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div id='logo' class='top-div-item_vaimorre navbar-header'>
               <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>               
               <!--a id="HTFont" class="navbar-brand" href="#">ThreeScript</a-->
               <img id='img-logo' src='/img/ts/logo/logo.01a.127x33.png'>
            </div>
            <!--div id='id-release' class='top-div-item'>
               r72.1
            </div-->
            <!--ul class="nav navbar-nav">
               <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
               <li><a href="#">Link</a></li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Another action</a></li>
                     <li><a href="#">Something else here</a></li>
                     <li class="divider"></li>
                     <li><a href="#">Separated link</a></li>
                     <li class="divider"></li>
                     <li><a href="#">One more separated link</a></li>
                  </ul>
               </li>
            </ul-->
            <div id="navbar-main" class='navbar-collapse collapse' style='top: -9px;'>
               <?php
               if (isset($userid)) {
                  echo "
                     <form id='form-signout' action='?auth' method='post' class='navbar-form navbar-right' role='form'>
                     <input type='hidden' name='auth'></input>
                     <input id='operation' type='hidden' name='operation'></input>" .
                  formFieldBS(_("Name"), "text", "id-name", "name", $firstname, "glyphicon-user") . "                           
                     <button id='signout' type='submit' class='btn btn-primary'>" . _("Sign Out") . "</button>
                     </form>";
               } else {
                  echo "
                     <form id='form-signin' action='?' method='post' class='navbar-form navbar-right' role='form'>
                     <input type='hidden' name='auth'></input>
                     <input id='operation' type='hidden' name='operation'></input>" .
                  formFieldBS(_("Nickname or Email"), "text", "id-nickname-or-email", "nickname_or_email", "", "glyphicon-user") .
                  formFieldBS(_("Password"), "password", "id-password", "password", "", "glyphicon-lock") . "
                     <button id='signin' type='submit' class='btn btn-primary'>" . _("Sign In") . "</button>
                     <button  id='register' type='submit' class='btn btn-primary'>" . _("Register") . "</button>
                     </form>";                     /*
                    echo "
                    <form id='form-signin' action='?' method='post' class='navbar-form navbar-right' role='form'>
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
                   */
               }
               ?>
            </div>
         </div>
      </div>
      <!--/nav-->
      <section class="block">
         <div id="panel-container"  class="panel-body" role="main">
            <div id="panel-container-tree" class="panel-default">
               <div id="tree"></div>
               <div id="tree-status" class="panel-footer">
                  <div id="id-status-tree" class="status-item abs0000">
                  </div>
               </div>
            </div>
            <div id="panel-container-data" class="panel-default">
               <div id="data">
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
               <!--a id="upload" href="#" class="fl btn btn-primary"><span class="glyphicon glyphicon-print"></span>Upload</a-->
               <input id="file-upload" name="file-upload" type="file" class="button button-primary button-small" style="display: none"/>
            </form>
            <form id="form-run" action="?" method="post" target="_blank">
               <input id="userid" name="userid" type="hidden" value=""/>
               <input id="nickname" name="nickname" type="hidden" value=""/>
               <input id="filename" name="filename" type="hidden" value=""/>
               <input id="run" name="run" type="hidden" value=""/>
            </form>
            <button id="btn-run" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-play"></span><? echo _("Run"); ?></button>
            <button id="btn-save" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-floppy-save"></span><? echo _("Save"); ?></button>
            <button id="btn-new-folder" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-plus"></span><? echo _("New Folder"); ?></button>
            <button id="btn-new-file" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-plus"></span><? echo _("New File"); ?></button>
            <button id="btn-rename" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-edit"></span><? echo _("Rename"); ?></button>
            <button id="btn-remove" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-remove"></span><? echo _("Delete"); ?></button>
            <button id="btn-upload" class="fl ml5 btn btn-primary"><span class="mr5 glyphicon glyphicon-floppy-open"></span><? echo _("Upload"); ?></button>
         </div>
      </section>
      <!--/div-->
   </body>
</html>
