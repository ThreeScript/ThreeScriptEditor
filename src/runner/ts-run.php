<?
$threejs_version = "r72";
$threescript_version = "r72.1";

$threejs_filepaths = array();

function addScriptList() {
   
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Run</title>
      <meta name="viewport" content="width=device-width" />
      <?
      require ("$threescriptEditorSrcDir/headers/ts-threejs.php");
      require ("$threescriptEditorSrcDir/headers/threescript.php");
      require ("$threescriptEditorSrcDir/headers/studddio.php");
      ?>
      <link href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" rel="stylesheet" />
      <link href="/oslib/js/unicorn-ui.com/css/buttons.css" rel="stylesheet" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <style>
         body, html {
            position: absolute; 
            left: 0px; 
            top: 0px; 
            right: 0px; 
            bottom: 0px; 
            margin: 0px; 
            padding: 0px;
            border: 0px;
            background: transparent;
            overflow: hidden;
         }
         .error {
            position: absolute;
            left: 0px;
            right: 0px;
            top: 0px;
            bottom: 0px;
            color: white;
            background: red;
         }
      </style>
   </head>
   <body onload='init_ts();' class='ts'>
      <?php
      echo "      
         <script>
            function init_ts() {
               try {
      ";
      $url = dirname(__DOCUMENT_ROOT__) . "/";
      $filepath = "$url/$filename";
      $file = fopen($filepath, "r");
      if ($file) {
         while (($line = fgets($file)) !== false)
            echo $line;
         fclose($file);
      }
      echo "
               }
               catch (err) {
                  $('body').append(
                     '<div class=\'error\'>'+
                     '<table>' +
                     '<tr><td>error</></td><td>' + err.message + '</td></tr>' +
                     '<tr><td>stack</></td><td>' + err.stack + '</td></tr>' +
                     '<tr><td>line</></td><td>' + err.line + '</td></tr>' +
                     '</table>' +
                     '</div>');
               }
            }
         </script>";
      ?>
   </body>
</html>