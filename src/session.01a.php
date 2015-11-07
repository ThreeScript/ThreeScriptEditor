<?php

session_start();

$userid = null;
$nickname = null;
$firstname = null;
$lastname = null;
$readonly = false;

if ($_SESSION["ID"]) {
   $userid = $_SESSION["ID"];
   $nickname = $_SESSION["NICKNAME"];
   $firstname = $_SESSION["FIRSTNAME"];
   $lastname = $_SESSION["LASTNAME"];
   $url = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . $nickname . DIRECTORY_SEPARATOR;
} else {
   $url = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "$environment/examples" . DIRECTORY_SEPARATOR;
   $readonly = true;
}
?>
