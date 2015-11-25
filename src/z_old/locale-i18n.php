<?php

function initialize_i18n($locale) {
   putenv('LANG=' . $locale);
   setlocale(LC_ALL, "");
   setlocale(LC_MESSAGES, $locale);
   setlocale(LC_CTYPE, $locale);
   $domains = glob($locales_root . '/' . $locale . '/LC_MESSAGES/messages-*.mo');
   $current = basename($domains[0], '.mo');
   $timestamp = preg_replace('{messages-}i', '', $current);
   bindtextdomain($current, $locales_root);
   textdomain($current);
}

function initialize_i18n_2($language) {
   $language = substr($language, 0, 2) . "_" . substr($language, 3, 2);
   /*
   echo $language; die();
   if ($language === "pt-BR") {
      $language = "pt_BR";
   } else {
      $language = "en_US";
   }
   */
   putenv("LANG=" . $language);
   setlocale(LC_ALL, $language);
   $domain = "messages";
   bindtextdomain($domain, "locale");
   bind_textdomain_codeset($domain, 'UTF-8');
   textdomain($domain);
}

initialize_i18n_2(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,5));

?>
