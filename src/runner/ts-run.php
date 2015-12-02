<?
$threejs_version = "r72";
$threescript_version = "r72.1";

$threejs_filepaths = array(
);

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
      <?= "<script src='$threescriptEditorSrcDir/google/ts-analytics.js'></script>" ?>

      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <!--script src="/master/ThreeScript/build/tsthreejs-r73.js"></script-->

      <script src="/oslib/js/threejs/r73/build/three.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/geometries/TextGeometry.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/utils/FontUtils.js"></script>

      <script src="/oslib/js/threejs/r73/examples/js/shaders/ConvolutionShader.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/shaders/CopyShader.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/shaders/FilmShader.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/shaders/FXAAShader.js"></script>

      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/EffectComposer.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/RenderPass.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/ShaderPass.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/MaskPass.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/BloomPass.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/postprocessing/FilmPass.js"></script>

      <script src="/oslib/js/threejs/r73/examples/js/effects/AnaglyphEffect.js"></script>

      <script src="/oslib/js/threejs/r73/examples/js/Detector.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/controls/TrackballControls.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/controls/FirstPersonControls.js"></script>
      <script src="/oslib/js/threejs/r73/examples/js/libs/stats.min.js"></script>

      <script src="/oslib/js/threejs/r73/examples/js/loaders/OBJLoader.js"></script>

      <script src="/oslib/js/threejs/r73/examples/fonts/gentilis_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/gentilis_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/optimer_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/optimer_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/helvetiker_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/helvetiker_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/droid/droid_sans_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/droid/droid_sans_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/droid/droid_serif_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r73/examples/fonts/droid/droid_serif_bold.typeface.js"></script>

      <link href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" rel="stylesheet" />
      <link href="/oslib/js/unicorn-ui.com/css/buttons.css" rel="stylesheet" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>

      <?php
      echo "      
<script>
   function init_ts() {
      try {
";

      $filename = $_REQUEST["filename"];

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
      </script>
   </head>
   <body onload='init_ts();' class='ts'>
   </body>
</html>";
      ?>
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

      <? echo "<script src='$threescriptSrcDir/ts/ts.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/cameras/cameras.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/container/container.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/core/core.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/examples/js/controls.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/examples/js/effects.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/extras/extras.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/extras/geometries/geometries.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/lights/lights.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/loaders/loaders.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/materials/materials.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/math/math.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/meshes/meshes.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/objects/objects.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/renderers/renderers.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/scenes/scenes.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/textures/textures.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/locale/pt_BR/all.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/common/S3dObject3D.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/common/S3dMesh.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/common/S3dPos.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/util/S3dLinkedList.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/util/S3dGeometryStyle.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/util/S3dGeometryStyleChar.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/geometry/S3dBox.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/geometry/S3dPlane.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/geometry/S3dPlaneParam.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/geometry/S3dPlaneChain.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/text/S3dText.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/text/S3dTextParam.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/text/S3dTextChain.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/presentation/S3dPresentation.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/presentation/S3dPresentationFrame.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/richText/S3dRichCtrl.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/richText/S3dRichChain.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/richText/S3dRichChar.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/richText/S3dRichText.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/richText/S3dRichMemo.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/util/S3dEditor.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/sceneMaker/S3dSceneMaker.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dAction.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionMove.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionMoveOn.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionMoveTo.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionRotate.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionRotateOn.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionRotateTo.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/action/S3dActionChain.js'></script>\n"; ?>

      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/global.js'></script>\n"; ?>
      <!--script src="/site/v2015.r6.1/eventos.js"></script-->
      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/inicio.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/animacao.js'></script>\n"; ?>
      <!--script src="/site/v2015.r6.1/principal.js"></script-->

      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/presentation/studddioPresentation.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/presentation/studddioPresentationFrame.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/presentation/studddioPresentationParam.js'></script>\n"; ?>
      <? echo "<script src='$threescriptSrcDir/ts/studddio/site/v2015.r6.1/presentation/startPresentation.js'></script>\n"; ?>
