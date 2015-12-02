<?php

if ($debug) {
   
}

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
    "examples/js/libs/stats.min.js"
);

$output_threejs_filedir = "$docroot/master/ThreeScript/build";
$output_threejs_filename = "tsthreejs-$threejs_version.js";
$output_threejs_filepath = "$output_threejs_filedir/$output_threejs_filename";

createFilepathFromFilepaths(
        $input_threejs_filedir, $input_threeejs_filepaths, 
        $output_threejs_filepath, $verbose, $save, $comment);

?>
