<?php
function linkDatabase() {
   $link = mysql_connect("localhost", "rptcombr_admin_1", "?Rpt64629402", "rptcombr_s3d-01");
   mysql_select_db('rptcombr_s3dd_01', $link);
   return $link;
}
?>
