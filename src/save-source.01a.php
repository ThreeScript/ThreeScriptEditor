<?php

$fileid = $_REQUEST["fileid"];
$text = $_REQUEST["txt"];

$myfile = fopen("$url/$fileid", "w");

if ($myfile) {
   fwrite($myfile, $text);
   fclose($myfile);
   echo '{"error": "0", "msg": "File saved!", "d": "' . $url . '", "f":"' . $fileid . '", "df": "' . $url . $fileid . '"}';
} else {
   echo '{"error": "1", "msg": "Unable to open file!"}';
}
?>
