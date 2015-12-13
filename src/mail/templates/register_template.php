<?php

/** ----------------------------------------------------------------------------
 * @param type $msg
 * @param type $format
 * @param type $style
 * @return type
 * -----------------------------------------------------------------------------
 */
function mailDiv($msg, $style, $newlines, $format) {
   $str = null;
   switch ($format) {
      case 'html': {
            $str = "<div style='$style'>$msg</div>";
            break;
         }
      case 'txt': {
            $str = $msg . str_repeat("\n", $newlines);
            break;
         }
   }
   return $str;
}

/** ----------------------------------------------------------------------------
 * @param type $msg
 * @param type $format
 * @param type $style
 * @return type
 * -----------------------------------------------------------------------------
 */
function mailLink($url, $msg, $style, $newlines, $format) {
   $str = null;
   switch ($format) {
      case 'html': {
            $str = "<a url='$url' style='$style'>$msg</a>";
            break;
         }
      case 'txt': {
            $str = $msg . str_repeat("\n", $newlines);
            break;
         }
   }
   return $str;
}

/** ----------------------------------------------------------------------------
 * @param type $format
 * -----------------------------------------------------------------------------
 */
function createRegisterTemplate($url, $key, $format) {
   $main = "width: 600px; height: 800px; background: #ddd; padding: 20px;";
   $verdana = "font-family: Verdana, Arial, Geneva; ";
   $fs18 = "font-size: 18px; ";
   $fs16 = "font-size: 16px; ";
   $bgray_eee = "background: #eee; ";
   $b1pxs000 = "border: 1px solid #000; ";
   $mb20 = "margin-bottom: 20px; ";
   $pad5 = "padding: 5px; ";
   $cblack = "color: #000; ";
   $white = "color: #fff; ";
   $red = "color: #f00; ";
   $green = "color: #0f0; ";
   $blue = "color: #00f; ";
   $yellow = "color: #ffe; ";
   $orange = "color: #f8e; ";
   
   $style_welcome = "$verdana $fs18 $bgray_eee $b1pxs000 $mb20 $pad5 $cblack";
   $style_thank_you = "$verdana $fs16 $bgray_eee $b1pxs000 $mb20 $pad5 $green";
   $style_please_confirm = "$verdana $fs14 $bgray_eee $b1pxs000 $mb20 $pad5 $blue";
   $style_link = "$verdana $fs12 $bgray_eee $b1pxs000 $mb20 $pad5 $red";
   $style_copy_link = "$verdana $fs12 $bgray_eee $b1pxs000 $mb20 $pad5 $red";
   $style_you_received = "$verdana $fs12 $bgray_eee $b1pxs000 $mb20 $pad5 $black";
   $style_normal = "$verdana $fs12";
   
   $str .= mailDiv(_("Welcome") . " {USERNAME} " . _("to") . " ThreeScript!", $style_welcome, 2, $format);
   $str .= mailDiv(_("Thank you for creating an account in TS."), $style_thank_you, 2, $format);
      if ($format === "html") {
      $str .= mailDiv(_("Please confirm your account by clicking the link below!"), "$style_please_confirm $blue", 2, $format);
      $keylink = mailLink($url, $key, $style_link, 0, $format);
      $str .= mailDiv($keylink, "", 2, $format);
      $str .= mailDiv(_("If the above link is not working, please copy and paste the url address below."), $style_please_confirm, 2, $format);
   } else {
      $str .= mailDiv(_("Please confirm your account, copying and pasting the address below."), "", 2, $format);
   }
   $str .= mailDiv($url, $style_copy_link, 2, $format);
   $str .= mailDiv(_("into your browsers address bar."), $style_you_received, 2, $format);
   $str .= mailDiv(_("You received this e-mail because you are currently a member of ThreeScript."), $style_you_received, 2, $format);
   $contact = mailLink("master@threescript.com", $key, $style_you_received, 0, $format);
   $str .= mailDiv(_("If you think you should not have to receive this e-mail, please contact $contact"), $style_you_received, 2, $format);
   if ($format === 'html') {
      $str = mailDiv($str, $main, 0, $format);
   }
   return $str;
}

/* -------------------------------------------------------------------------- */
?>
