<?php

putenv('TMPDIR=' . $_SERVER['DOCUMENT_ROOT'] . "/tmp");

/** ----------------------------------------------------------------------------
 * @param String $info
 * @return String
 * -----------------------------------------------------------------------------
 */
function send_email($info) {
   $transport = Swift_MailTransport::newInstance();
   $mailer = Swift_Mailer::newInstance($transport);
   $message = Swift_Message::newInstance();
   $message->setSubject('Welcome to ThreeScript.');
   $message->setFrom(array('master@threescript.com' => 'ThreeScript'));
   $message->setTo(array($info['email'] => $info['firstname']));
   $message->setBody($info["txt"]);
   $message->addPart($info["html"], 'text/html');
   $result = $mailer->send($message);
   return $result;
}

/** ----------------------------------------------------------------------------
 * @param String $info
 * @param String $format
 * @return String
 * -----------------------------------------------------------------------------
 */
function format_email($template) {
   $template = ereg_replace('{USERNAME}', $info['firstname'], $template);
   $template = ereg_replace('{EMAIL}', $info['email'], $template);
   $template = ereg_replace('{KEY}', $info['key'], $template);
   $template = ereg_replace('{SITEPATH}', 'http://threescript.com', $template);
   return $template;
}

/* -------------------------------------------------------------------------- */
?>
