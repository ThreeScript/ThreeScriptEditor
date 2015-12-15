<?php

/** ----------------------------------------------------------------------------
 * @param type $format
 * -----------------------------------------------------------------------------
 */
function createConfirmTemplate($format) {
   $main = "background: #eee; padding: 20px;";
   $verdana = "font-family: Verdana, Arial, Geneva; ";
   $fs18 = "font-size: 18px; ";
   $fs16 = "font-size: 16px; ";
   $fs12 = "font-size: 12px; ";
   $fs10 = "font-size: 10px; ";
   $bgray_eee = "background: #eee; ";
   $b1pxs000 = "border: 0px solid #000; ";
   $mt20 = "margin-top: 20px; ";
   $mb20 = "margin-bottom: 20px; ";
   $pad5 = "padding: 5px; ";
   $cblack = "color: #000; ";
   $white = "color: #fff; ";
   $red = "color: #f00; ";
   $green = "color: #0f0; ";
   $blue = "color: #00f; ";
   $yellow = "color: #ffe; ";
   $orange = "color: #f80; ";
   
   $style_welcome = "$verdana $fs18 $bgray_eee $b1pxs000 $mb20 $pad5 $cblack";
   $style_thank_you = "$verdana $fs16 $bgray_eee $b1pxs000 $mb20 $pad5 $green";
   $style_please_signin = "$verdana $fs14 $bgray_eee $b1pxs000 $mb20 $pad5 $blue";
   $style_link = "$verdana $fs14 $bgray_eee $b1pxs000 $mb20 $pad5 $cblack";
   $style_copy_link = "$verdana $fs10 $bgray_eee $b1pxs000 $mb20 $pad5 $cblack";
   $style_you_received = "$verdana $fs12 $bgray_eee $b1pxs000 $mb20 $pad5 $cblack";
   $style_normal = "$verdana $fs12";
   
   $url = "www.threescript.com/auth?operation=signin";
   $str .= mailDiv(_("Congratulations,") . " {USERNAME}, " . _("you are registered in") . " ThreeScript!", $style_welcome, 2, $format);
   $str .= mailDiv(_("Thank you for creating an account in TS."), $style_thank_you, 2, $format);
      if ($format === "html") {
      $str .= mailDiv(_("Please sign into your account by clicking the link below!"), "$style_please_signin $blue", 2, $format);
      $str .= mailLink($url, $key, $style_link, 2, $format);
      $str .= mailDiv(_("If the above link is not working, please copy and paste the url address below."), "$style_please_signin $blue $mt20", 2, $format);
   } else {
      $str .= mailDiv(_("Please sign into your account, copying and pasting the address below."), "", 2, $format);
   }
   $str .= mailDiv($url, $style_copy_link, 2, $format);
   $str .= mailDiv(_("into your browsers address bar."), "$style_please_signin $blue", 2, $format);
   $str .= mailDiv(_("You received this e-mail because you are currently a member of ThreeScript."), $style_you_received, 2, $format);
   $contact = mailLink("mail:master@threescript.com", "master@threescript.com", "$red", 0, $format);
   $str .= mailDiv(_("If you think you should not have to receive this e-mail, please contact $contact"), $style_you_received, 2, $format);
   if ($format === 'html') {
      $str = mailDiv($str, $main, 0, $format);
   }
   return $str;
}

/* -------------------------------------------------------------------------- */
?>
