<?php

/** ----------------------------------------------------------------------------
 * @param type $nickname
 * @param type $email
 * @param type $key
 * -----------------------------------------------------------------------------
 */
function sendRegisterEmail($nickname, $firstname, $email) {
   $url = "{SITEPATH}?auth&operation=confirm&email={EMAIL}&key={KEY}";
   $key = md5($nickname . $email);
   $template_php = true;
   if ($template_php) {
      $template_html = createRegisterTemplate($url, $key, 'html');
      $template_txt = createRegisterTemplate($url, $key, 'txt');
   } else {
      $filedir = 'master/ThreeScriptTools/src/mail/templates';
      $filename = 'register_template';
      $root = $_SERVER['DOCUMENT_ROOT'] . "/$filedir";
      $template_html = file_get_contents("$root/$filename.html");
      $template_txt = file_get_contents("$root/$filename.txt");
   }
   $info = array(
       'nickname' => $nickname,
       'firstname' => $firstname,
       'email' => $email,
       'key' => $key,
       'html' => $template_html,
       'txt' => $template_txt
   );
   $info["html"] = format_email($template_html, $info, "html");
   $info["txt"] = format_email($template_txt, $info, "txt");
   return send_email($info);
}

/** ----------------------------------------------------------------------------
 * @param type $nickname
 * @param type $email
 * @param type $key
 * -----------------------------------------------------------------------------
 */
function sendConfirmedEmail($nickname, $firstname, $email) {
   $template_php = true;
   if ($template_php) {
      $template_html = createConfirmTemplate('html');
      $template_txt = createConfirmTemplate('txt');
   } else {
      $filedir = 'master/ThreeScriptTools/src/mail/templates';
      $filename = 'register_template';
      $root = $_SERVER['DOCUMENT_ROOT'] . "/$filedir";
      $template_html = file_get_contents("$root/$filename.html");
      $template_txt = file_get_contents("$root/$filename.txt");
   }
   $info = array(
       'nickname' => $nickname,
       'firstname' => $firstname,
       'email' => $email,
       'html' => $template_html,
       'txt' => $template_txt
   );
   $info["html"] = format_email($template_html, $info, "html");
   $info["txt"] = format_email($template_txt, $info, "txt");
   $res = send_email($info);
   if ($res) {
      echo "the email was sent to $email";
   } else {
      echo "the email wasn't sent to $email: '$res'";
   }
}

?>
