<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Run</title>
      <meta name="viewport" content="width=device-width" />

      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <script src="/master/ThreeScript/build/tsthreejs-r72.js"></script>

      <!--script src="/oslib/js/threejs/r72/build/three.min.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/utils/GeometryUtils.js"></script>

      <script src="/oslib/js/threejs/r72/examples/js/shaders/ConvolutionShader.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/shaders/CopyShader.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/shaders/FilmShader.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/shaders/FXAAShader.js"></script>

      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/EffectComposer.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/RenderPass.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/ShaderPass.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/MaskPass.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/BloomPass.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/postprocessing/FilmPass.js"></script>

      <script src="/oslib/js/threejs/r72/examples/js/effects/AnaglyphEffect.js"></script>

      <script src="/oslib/js/threejs/r72/examples/js/Detector.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/controls/TrackballControls.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/controls/FirstPersonControls.js"></script>
      <script src="/oslib/js/threejs/r72/examples/js/libs/stats.min.js"></script-->

      <script src="/oslib/js/threejs/r72/examples/fonts/gentilis_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/gentilis_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/optimer_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/optimer_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/helvetiker_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/helvetiker_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/droid/droid_sans_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/droid/droid_sans_bold.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/droid/droid_serif_regular.typeface.js"></script>
      <script src="/oslib/js/threejs/r72/examples/fonts/droid/droid_serif_bold.typeface.js"></script>

      <link href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" rel="stylesheet" />
      <link href="/oslib/js/unicorn-ui.com/css/buttons.css" rel="stylesheet" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      
      <style>
         .ts {
            position: absolute; 
            left: 0px; 
            top: 0px; 
            right: 0px; 
            bottom: 0px; 
            margin: 0px; 
            padding: 0px;
            border: 0px;
            background: transparent;
         }
      </style>

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
         alert('error: ' + err.message);
         alert('stack: ' + err.stack);
         alert('line: ' + err.line);
      }
   }
</script>";
      ?>
   </head>
   <body onload="init_ts();" class="ts">
   </body>
</html>
