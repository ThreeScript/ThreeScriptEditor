<?php
function linkDatabase() {
   $link = mysql_connect("localhost", "rptcombr_admin_1", "?Rpt64629402", "rptcombr_s3d-01");
   return $link;
}
?>
