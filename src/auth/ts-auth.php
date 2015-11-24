<?php
if ($_SESSION["ID"]) {
   header("Location: http://www.threescript.com");
}

$operation = $_REQUEST["operation"];
if (!isset($operation))
   $operation = 'none';

$nickname_or_email = $_REQUEST["nickname_or_email"];
$nickname = $_REQUEST["nickname"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$email2 = $_REQUEST["email2"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];

$form_register = null;
$form_login = null;
$provider_user_id = null;

switch ($operation) {
   case "signout":
      $_SESSION = array();
      if (isset($_COOKIE[session_name()])) {
          setcookie(session_name(), '', time()-42000, '/');
      }
      session_destroy();
      // $_SESSION["ID"] = null;
      header("Location: http://www.threescript.com");
      break;
   case "signin":
      if (isset($nickname_or_email) && isset($password)) {
         $link = linkDatabase() or die(_("Connection error!"));
         $qry = get_user_by_nickname_or_email($link, $nickname_or_email);
         $user = mysql_fetch_assoc($qry);
         $password_crypt = cryptPassword($user["nickname"], $password);
         $ok = ($password_crypt === $user["password"]);
         if ($ok) {
            $_SESSION["ID"] = $user["id"];
            $_SESSION["NICKNAME"] = $user["nickname"];
            $_SESSION["FIRSTNAME"] = $user["firstname"];
            $_SESSION["LASTNAME"] = $user["lastname"];
            $_SESSION["EMAIL"] = $user["email"];
            $dir = "users/" . $_SESSION["NICKNAME"];
            if (!is_dir($dir)) {
               $ok = mkdir($dir);
            }
            header("Location: http://www.threescript.com");
         } else {
            $error_msg = _("Wrong nickname, email or password.");
            $form_login = formLogin();
         }
      } else {
         $form_login = formLogin();
      }
      break;
   case "social-signin":
      $provider = $_REQUEST["provider"];
      if (isset($provider)) {
         try {
            $path = $_SERVER["DOCUMENT_ROOT"] . "/oslib/php/hybridauth.2.5.1/hybridauth";
            $config = "config-auth.php";
            require_once( $path . "/Hybrid/Auth.php" );
            $hybridauth = new Hybrid_Auth($config);
            $adapter = $hybridauth->authenticate($provider);
            $user_profile = $adapter->getUserProfile();
         } catch (Exception $e) {
            $error_msg = $e->getMessage();
            $form_login = formLogin();
         }
         if (isset($user_profile)) {
            $link = linkDatabase() or die("Connection error!");
            $email = $user_profile->email;
            $user = get_user_by_email($link, $email);
            if ($user) {
               $_SESSION["ID"] = $user["id"];
               $_SESSION["NICKNAME"] = $user["nickname"];
               $_SESSION["FIRSTNAME"] = $user["firstname"];
               header("Location: http://www.threescript.com");
            } else {
               $firstname = $user_profile->firstName;
               $lastname = $user_profile->lastName;
               $provider_user_id = $user_profile->identifier;
               //create_new_hybridauth_user($link, $email, $firstname, $lastname, $provider, $provider_user_id);
               $form_register = formRegister($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
            }
         } else {
            $form_login = formLogin();
         }
      }
      break;
   case "register":
      $form_register = formRegister($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
      break;
   case "save-register":
      $link = linkDatabase() or die("Connection error!");
      $ok = create_new_user($link, $nickname, $firstname, $lastname, $email, $password);
      if (!$ok) {
         $form_register = formRegister($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
      } else {
         header("Location: http://www.threescript.com");
      }
      break;
   default:
      $form_login = formLogin();
      break;
}

// initialize_i18n(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 5));

function linkDatabase_() {
   $link = mysql_connect("localhost", "user_name", "user_password");
   mysql_select_db('db_name', $link);
   return $link;
}

function formLogin() {
   $operation = "<input id='operation' type='hidden' name='operation' value=''>";
   $nickname = formField(_("Nickname or Email"), "text", "nickname_or_email", "nickname_or_email", "");
   $password = formField(_("Password"), "password", "password", "password", "");
   $buttons = providersButtons();

   $str = "
      <form id='form-signin' action='?' method='post'>
         <div id='form-signin-div' class='pr'>
            <div class='pr form-title'>" . _("Sign In") . "</div>
            $operation
            $nickname
            $password
            <div class='pr form-buttons'>
               <div class='pr fl'><a id='signin' href='#' rel='" . _("Sign In") . "' class='pr button button-primary button-big'>" . _("Sign In") . "</a></div>
               <div class='pr fl ml5'><a id='register' href='#' rel='" . _("Register") . "Register' class='pr button button-primary button-big'>" . _("Register") . "</a></div>
               $buttons
            </div>
         </div>
      </form>";
   return $str;
}

function formRegister($provider, $nickname, $firstname, $lastname, $email, $provider_user_id) {
   $operation = "<input id='operation' type='hidden' name='operation' value=''>";
   $nickname = formField(_("Nickname"), "text", "nickname", "nickname", "");
   $firstname = formField(_("First Name"), "text", "firstname", "firstname", $firstname);
   $lastname = formField(_("Last Name"), "text", "lastname", "lastname", $lastname);
   $email = formField(_("Email"), "text", "email", "email", $email);
   if ($provider)
      $email2 = "";
   else
      $email2 = formField(_("Retype Email"), "text", "email2", "email2", "");
   $password = formField(_("Password"), "password", "password", "password", "");
   $password2 = formField(_("Retype Password"), "password", "password2", "password2", "");

   $buttons = providersButtons();

   $str = "
      <form id='form-signin' action='?'>
         <div id='form-register-div' class='pr'>
            <div class='form-title'>" . _("Register") . "</div>
            $operation
            $nickname
            $firstname
            $lastname
            $email
            $email2
            $password
            $password2
            <div class='pr form-buttons'>
               <div class='pr fl ml5'><a id='save-register' href='#' rel='" . _("Save Register") . "' class='pr button button-primary button-big'>" . _("Save Register") . "</a></div>
               <div class='pr fl' style='margin-left: 10px'><a id='signin' href='#' rel='" . _("Sign In") . "' class='pr button button-primary button-big'>" . _("Sign In") . "</a></div>
               $buttons
            </div>
         </div>
      </form>";
   return $str;
}

function mysql_query_exec($link, $sql) {
   $result = mysql_query($sql, $link);
   if (!$result)
      die(printf(_("Error: %s\n"), mysql_error($link)));
   return $result;
}

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

function providersButtons() {
   $disable_buttons = true;
   if ($disable_buttons)
      return "";
   $f = providerButton("facebook", "Facebook");
   $t = providerButton("twitter", "Twitter");
   $l = providerButton("linkedin", "Linkedin");
   $str = "<div class='pr fl or-use'>Or use</div>$f $t $l";
   return $str;
}

function providerButton($name, $title) {
   $str = "
      <div class='pr fl social-button'>
         <a href='login.01b.php?operation=social-signin&provider=$name' rel='$title'>
            <img src='/img/social/01/png/long-shadow/32/$title.png' />
         </a>
      </div>";
   return $str;
}
?>

<html>
   <head>
      <title><? echo _('Signin or Register'); ?></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width" />
      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <link href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" rel="stylesheet" />
      <link href="/oslib/js/unicorn-ui.com/css/buttons.css" rel="stylesheet" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <?= "<script src='$threescriptEditorSrcDir/auth/ts-auth.js'></script>" ?>
      <?= "<link href='$threescriptEditorSrcDir/auth/ts-auth.css'  rel='stylesheet'/>" ?>
   </head>
   <body>
      <div id="signin-or-register" class="pr">
         <div id="logo" class="pr">
            <div id="logo-ts" class="pr">
               <div class='t' style='font-size: 46px;'>t</div><div class='s'>s</div>
            </div>
            <div id="logo-threescript" class="pr">
               <div class='t'>three</div><div class='s'>script</div>
            </div>
         </div>
         <div id="form-signin-or-register" class="pr">
            <?
            if ($form_login) {
               echo $form_login;
            } elseif ($form_register) {
               echo $form_register;
            }
            ?>
         </div>
      </div>
   </body>
</html>
