<?php

$silent = ($_REQUEST["silent"] === "1");
$verbose = !$silent;
// $save = ($_REQUEST["save"] === "1");
$save = true;
$comment = false;

function appendFileFromFilepath($output_file, $input_filepath, $verbose, $save, $comment) {
   if ($comment && $save)
      fwrite($output_file, "\n\n\\\\\ $input_filepath\n\n");
   if ($comment && $verbose)
      echo "\n\n\\\\\ $input_filepath\n\n";
   $input_file = fopen($input_filepath, "r");
   if ($input_file) {
      while (($input_line = fgets($input_file)) !== false) {
         if ($save)
            fwrite($output_file, $input_line);
         if ($verbose)
            echo $input_line;
      }
      fclose($input_file);
   }
}

function createFilepathFromFilepaths($input_filedir, $input_filepaths, $output_filepath, $verbose, $save, $comment) {
   if ($save)
      $output_file = fopen($output_filepath, "w");
   else
      $output_file = null;
   if ($output_file) {
      foreach ($input_filepaths as $filepath) {
         appendFileFromFilepath($output_file, "$input_filedir/$filepath", $verbose, $save, $comment);
      }
      fclose($output_file);
   }
}

$threejs_version = "r73";
$threescript_version = "r73-1";

$input_threescript_filedir = "$docroot/master/ThreeScript/src";
$input_threescript_filepaths = array(
    "animation/animation.js",
    "animation/tracks/tracks.js",
    "cameras/cameras.js",
    "container/container.js",
    "core/core.js",
    "examples/js/controls.js",
    "examples/js/effects.js",
    "extras/extras.js",
    "extras/audio/audio.js",
    "extras/core/core.js",
    "extras/curves/curves.js",
    "extras/geometries/geometries.js",
    "extras/helpers/helpers.js",
    "extras/objects/objects.js",
    "lights/lights.js",
    "loaders/loaders.js",
    "materials/materials.js",
    "math/math.js",
    "meshes/meshes.js",
    "objects/objects.js",
    "renderers/renderers.js",
    "scenes/scenes.js",
    "textures/textures.js",
);

$output_threescript_filedir = "$docroot/master/ThreeScript/build";
$output_threescript_filename = "threescript-$threescript_version.js";
$output_threescript_filepath = "$output_threescript_filedir/$output_threescript_filename";

createFilepathFromFilepaths(
        $input_threescript_filedir, $input_threescript_filepaths, $output_threescript_filepath, $verbose, $save, $comment);

$input_threejs_filedir = "$docroot/oslib/js/threejs/$threejs_version";
$input_threeejs_filepaths = array(
    "build/three.min.js",
    "examples/js/utils/GeometryUtils.js",
    "examples/js/shaders/ConvolutionShader.js",
    "examples/js/shaders/CopyShader.js",
    "examples/js/shaders/FilmShader.js",
    "examples/js/shaders/FXAAShader.js",
    "examples/js/postprocessing/EffectComposer.js",
    "examples/js/postprocessing/RenderPass.js",
    "examples/js/postprocessing/ShaderPass.js",
    "examples/js/postprocessing/MaskPass.js",
    "examples/js/postprocessing/BloomPass.js",
    "examples/js/postprocessing/FilmPass.js",
    "examples/js/effects/AnaglyphEffect.js",
    "examples/js/Detector.js",
    "examples/js/controls/TrackballControls.js",
    "examples/js/controls/FirstPersonControls.js",
    "examples/js/libs/stats.min.js"/*,
    "examples/fonts/gentilis_bold.typeface.js",
    "examples/fonts/gentilis_regular.typeface.js",
    "examples/fonts/optimer_bold.typeface.js",
    "examples/fonts/optimer_regular.typeface.js",
    "examples/fonts/helvetiker_bold.typeface.js",
    "examples/fonts/helvetiker_regular.typeface.js",
    "examples/fonts/droid/droid_sans_regular.typeface.js",
    "examples/fonts/droid/droid_sans_bold.typeface.js",
    "examples/fonts/droid/droid_serif_regular.typeface.js",
    "examples/fonts/droid/droid_serif_bold.typeface.js"*/
);

$output_threejs_filedir = "$docroot/master/ThreeScript/build";
$output_threejs_filename = "tsthreejs-$threejs_version.js";
$output_threejs_filepath = "$output_threejs_filedir/$output_threejs_filename";

createFilepathFromFilepaths(
        $input_threejs_filedir, $input_threeejs_filepaths, $output_threejs_filepath, $verbose, $save, $comment);
?>
