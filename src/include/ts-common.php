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
?>
