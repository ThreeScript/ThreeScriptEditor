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
      <meta property="og:image" content="http://threescript.com/img/ts/logo/logo.02a.673x317.png" />      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
      <meta property="og:app_id" content="975584632501298" />      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
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
      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
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
   </head>
   <body>
      <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <div id='logo' class='top-div-item_vaimorre navbar-header'>
                  <img src='/img/ts/logo/logo.01a.127x33.png'>
               </div>
            </div>
            <center>
               <div class="navbar-collapse collapse" id="navbar-main">
                  <ul class="nav navbar-nav">
                     <li class="active"><a href="#">Home</a>
                     </li>
                     <li><a href="#">About Us</a>
                     </li>
                     <li><a href="#">FAQ</a>
                     </li>
                     <li><a href="#">Contact</a>
                     </li>          
                  </ul>
                  <form class="navbar-form navbar-right" role="search">
                     <a class="btn btn-social-icon btn-facebook">
                        <i class="fa fa-facebook"></i>
                     </a>
                     <a class="btn btn-social-icon btn-twitter">
                        <i class="fa fa-twitter"></i>
                     </a>
                     <a class="btn btn-social-icon btn-dropbox">
                        <i class="fa fa-envelope"></i>
                     </a>
                  </form>
               </div>
            </center>
         </div>
      </div>

      <section class="block">
      </section>
   </body>
</html>
