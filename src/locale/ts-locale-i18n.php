<?php

function initialize_i18n_2($language) {
   $language = substr($language, 0, 2) . "_" . substr($language, 3, 2);
   putenv("LANG=" . $language);
   setlocale(LC_ALL, $language);
   $domain = "messages";
   bindtextdomain($domain, "locale");
   bind_textdomain_codeset($domain, 'UTF-8');
   textdomain($domain);
}

initialize_i18n_2(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 5));
?>
