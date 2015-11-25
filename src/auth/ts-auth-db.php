<?php

function get_user_by_email($link, $email) {
   return mysql_query_exec($link, "SELECT * FROM users WHERE email = '$email'");
}

function get_user_by_nickname_or_email($link, $nickname_or_email) {
   return mysql_query_exec($link, "
      SELECT id, nickname, firstname, lastname, email, password
      FROM users
      WHERE ((nickname = '$nickname_or_email') OR (email = '$nickname_or_email'))");
}

function get_user_by_email_and_password($link, $nickname, $email, $password) {
   // $password_crypt = cryptPassword($nickname, $password);
   return mysql_query_exec($link, "
      SELECT id, nickname, firstname
      FROM users 
      WHERE (email = '$email') AND (password = '$password_crypt')");
}

function get_user_by_provider_and_id($link, $provider, $provider_user_id) {
   return mysql_query_exec($link, "
      SELECT * 
      FROM users 
      WHERE hybridauth_provider_name = '$provider' 
         AND hybridauth_provider_uid = '$provider_user_id'");
}

function create_new_hybridauth_user($link, $email, $firstname, $lastname, $provider, $provider_user_id) {
   $password = md5(str_shuffle("0123456789abcdefghijklmnoABCDEFGHIJ"));
   mysql_query_exec($link, "
      INSERT INTO users (
         email,
         password,
         firstname,
         last_name,
         hybridauth_provider_name,
         hybridauth_provider_uid,
         creationdate)
      VALUES (
         '$email',
         '$password',
         '$firstname',
         '$lastname',
         $provider,
         $provider_user_id,
         NOW())"
   );
}

function cryptPassword($nickname, $password) {
   $salt = $nickname . substr($password, 0, strlen($nickname));
   return crypt($password, $salt);
}

function create_new_user($link, $nickname, $firstname, $lastname, $email, $password) {
   $password_crypt = cryptPassword($nickname, $password);
   $ok = mysql_query_exec($link, "
      INSERT INTO users (
         nickname,
         firstname,
         lastname,
         email,
         password,
         creationdate)
      VALUES (
         '$nickname',
         '$firstname',
         '$lastname',
         '$email',
         '$password_crypt',
         NOW())"
   );
   if ($ok && !is_dir("users/$nickname"))
      $ok = mkdir("users/$nickname");
   return $ok;
}

?>
