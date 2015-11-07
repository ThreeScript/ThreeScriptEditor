<?php

session_start();

$userid = null;
$nickname = null;
$firstname = null;
$lastname = null;
$readonly = false;

$docroot = $_SERVER["DOCUMENT_ROOT"];

if ($_SESSION["ID"]) {
   $userid = $_SESSION["ID"];
   $nickname = $_SESSION["NICKNAME"];
   $firstname = $_SESSION["FIRSTNAME"];
   $lastname = $_SESSION["LASTNAME"];
   $url = "$docroot/users/$nickname";
} else {
   $url = "$docroot/examples";
   $readonly = true;
}
?>
