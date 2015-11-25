<?php
function linkDatabase() {
   $link = mysql_connect("localhost", "user", "password");
   mysql_select_db('dbname', $link);
   return $link;
}
?>
