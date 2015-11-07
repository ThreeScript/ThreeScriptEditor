<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Run</title>
      <meta name="viewport" content="width=device-width" />

      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>

      <script src="/oslib/js/threejs/r71/build/three.min.js"></script>
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
      <script src="/oslib/js/threejs/r72/examples/js/libs/stats.min.js"></script>

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

      <script src="/src/threescript/r72/core/core.js"></script>
      <script src="/src/threescript/r72/scenes/scenes.js"></script>
      <script src="/src/threescript/r72/cameras/cameras.js"></script>
      <script src="/src/threescript/r72/renderers/renderers.js"></script>
      <script src="/src/threescript/r72/container/container.js"></script>
      <script src="/src/threescript/r72/objects/objects.js"></script>
      <script src="/src/threescript/r72/math/math.js"></script>
      <script src="/src/threescript/r72/materials/materials.js"></script>
      <script src="/src/threescript/r72/lights/lights.js"></script>
      <script src="/src/threescript/r72/extras/extras.js"></script>
      <script src="/src/threescript/r72/extras/geometries/geometries.js"></script>
      <script src="/src/threescript/r72/examples/js/effects.js"></script>
 
      <script>
         function init_ts() {
            try {
<?php
$filename = $_REQUEST["filename"];
$userid = $_REQUEST["userid"];
$nickname = $_REQUEST["nickname"];
/*
echo "fn: $filename, uid: $userid, nn: $nickname";
die();
*/ 
if (isset($userid) && (trim($userid) !== ""))
   $url = dirname(__FILE__) . "/users/$nickname";
else
   $url = dirname(__FILE__) . "/examples";

$filepath = "$url/$filename";
$file = fopen($filepath, "r");
if ($file) {
   while (($line = fgets($file)) !== false)
      echo $line;
   fclose($file);
}
?>
            }
            catch (err) {
               alert('error: ' + err.message);
               alert('stack: ' + err.stack);
               alert('line: ' + err.line);
            }
         }
      </script>
   </head>
   <body onload="init_ts();" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px;">
   </body>
</html>
