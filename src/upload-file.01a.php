<?php

require("session.01a.php");

if (!userid)
   die('');

$folder = $_REQUEST['folder'];

$file = $_FILES['userfile'];

$filename = $file['name'];

$tempfilename = $file['tmp_name'];

$filenamepath = "$url/$folder/$filename";

$data = "{
      \"folder\":\"$folder\",
      \"filename\":\"$filename\",
      \"tempfilename\":\"$tempfilename\",
      \"filenamepath\":\"$filenamepath\"
   }";

if (file_exists($filenamepath)) {
   echo '{"error": 1, msg="File exists, rename or delete it before upload.", "data":"' . $data . '"}';
   return;
}

if (!check_file_uploaded_length($filename)) {
   echo '{"error": 1, msg="Invalid file lenght.", "data":' . $data . '}';
   return;
}
if (!check_file_uploaded_name($filename)) {
   echo '{"error": 1, msg="Invalid file name.", "data":' . $data . '}';
   return;
}

/*
  echo '{"error": 1, "msg"="Last test.", "data":' . $data . '}';
  return;
 */

if (move_uploaded_file($tempfilename, $filenamepath)) {
   echo '{"error": 0, msg="Valid file uploaded with success.", "data":' . $data . '}';
} else {
   echo '{"error": 1, msg="File upload failed.", "data":' . $data . '}"';
}

function check_file_uploaded_length($filename) {
   return (bool) ((mb_strlen($filename, "UTF-8") < 255) ? true : false);
}

function check_file_uploaded_name($filename) {
   return true || (bool) ((preg_match("`^[-0-9A-Z_\.]+$`i", $filename)) ? true : false);
}

?>
