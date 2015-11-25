<?php
if ($_SESSION["ID"]) {
   header("Location: http://www.threescript.com");
}

$operation = $_REQUEST["operation"];
if (!isset($operation))
   $operation = 'none';

// echo "OPERATION: $operation <br/>";

$nickname_or_email = $_REQUEST["nickname_or_email"];
$nickname = $_REQUEST["nickname"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$email2 = $_REQUEST["email2"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];

// echo "nn: $nickname, fn: $firstname, ln: $lastname, em: $email, pw: $password2.";

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
      // echo "SIGNIN: $operation <br/>";
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
            header("Location: index.php");
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

function linkDatabase_() {
   $link = mysql_connect("localhost", "user_name", "user_password");
   mysql_select_db('db_name', $link);
   return $link;
}

function formField($field_title, $field_type, $field_id, $field_name, $field_value) {
   $str = "<div class='pr form-field'>";
   $str .= "<div class='pr fl form-field-label-div'>$field_title</div>";
   $str .= "<div class='pr fl form-field-input-div'>
      <input id='$field_id' type='$field_type' name='$field_name' 
      value='$field_value' placeholder='$field_title' class='form-field-input'/></div>";
   $str .= "</div>";
   return $str;
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
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/buttons.css" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <script>

         var nickname = null;
         var firstname = null;
         var lastname = null;
         var email = null;
         var email2 = null;
         var password = null;
         var password2 = null;

         function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
         }

         function validateNickname(nickname, minLength) {
            if (nickname.length < minLength)
               return false;
            var re = /^[a-z]\w*/i;
            var ok = re.test(nickname);
            return ok;
         }

         function validateName(name, minLength) {
            if (name.length < minLength)
               return false;
            var re = /^[a-zA-Z]\w*/i;
            var ok = re.test(name);
            return ok;
         }

         function validatePassword(pwString, minStrength) {
            var strength = 0;
            strength += /[A-Z]+/.test(pwString) ? 1 : 0;
            strength += /[a-z]+/.test(pwString) ? 1 : 0;
            strength += /[0-9]+/.test(pwString) ? 1 : 0;
            strength += /[\W]+/.test(pwString) ? 1 : 0;
            return (strength >= minStrength);
         }

         function test(ok, obj, msg) {
            if (!ok) {
               alert(msg);
               obj.focus();
            }
            return ok;
         }

         function testNickname(nickname, acceptEmpty) {
            var val = nickname.val().trim();
            if (acceptEmpty && (val === ''))
               return true;
            var ok = validateNickname(val, 4);
            return test(ok, nickname, 'Invalid nickname!');
         }

         function testName(name, acceptEmpty) {
            var val = name.val().trim();
            if (acceptEmpty && (val === ''))
               return true;
            var ok = validateName(val, 3);
            return test(ok, name, 'Invalid name!');
         }

         function testEmail(email, acceptEmpty) {
            var val = email.val().trim();
            if (acceptEmpty && (val === ''))
               return true;
            var ok = validateEmail(val, 3);
            return test(ok, email, 'Invalid email!');
         }

         function testRetypeEmail(email, email2, acceptEmpty) {
            var val2 = email2.val().trim();
            if (acceptEmpty && (val2 === ''))
               return true;
            var ok = val2 === email.val().trim();
            return test(ok, email2, 'Retype the same email!');
         }

         function testPassword(password, acceptEmpty) {
            var val = password.val().trim();
            var ok = acceptEmpty || ((val !== '') && validatePassword(val, 4));
            return test(ok, password, 'Invalid password or weak password!');
         }

         function testRetypePassword(password, password2, acceptEmpty) {
            var val2 = password2.val().trim();
            if (acceptEmpty && (val2 === ''))
               return true;
            var ok = val2 === password.val().trim();
            return test(ok, password2, 'Retype the same password!');
         }

         function prepareBlurEvents() {
            nickname.blur(function(e) {
               testNickname(nickname, true);
            });
            firstname.blur(function(e) {
               testName(firstname, true);
            });
            lastname.blur(function(e) {
               testName(lastname, true);
            });
            email.blur(function(e) {
               testEmail(email, true);
            });
            email2.blur(function(e) {
               testRetypeEmail(email, email2, true);
            });
            password.blur(function(e) {
               testPassword(password, true);
            });
            password2.blur(function(e) {
               testRetypePassword(password, password2, true);
            });
         }
         $(function() {

            nickname = $("#nickname");
            firstname = $("#firstname");
            lastname = $("#lastname");
            email = $("#email");
            email2 = $("#email2");
            password = $("#password");
            password2 = $("#password2");

            prepareBlurEvents();
            $("#signin").click(function(e) {
               var form = $("#form-signin");
               var input = $("#operation");
               input.val("signin");
               form.submit();
            });
            $("#register").click(function(e) {
               var form = $("#form-signin");
               var input = $("#operation");
               input.val("register");
               form.submit();
            });
            $("#save-register").click(function(e) {
               var ok =
                       testNickname(nickname, false) &&
                       testName(firstname, false) &&
                       testName(lastname, false) &&
                       testEmail(email, true) &&
                       testRetypeEmail(email, email2, false) &&
                       testPassword(email, true) &&
                       testRetypePassword(email, email2, false);
               if (ok) {
                  var form = $("#form-signin");
                  var input = $("#operation");
                  input.val("save-register");
                  form.submit();
               }
            });
         });
      </script>
      <style>
         .pr{
            position: relative;
         }
         .fl {
            float: left;
         }
         .ml5 {
            margin-left: 5px
         }
         .pt0 {
            padding-top: 0px;
         }
         .or-use {
            margin: 10px 30px 0px 50px;
            font-size: 14px;
            text-shadow: 0px 0px 1px #000;
         }
         #signin-or-register {
            width: 600px;
            min-width: 600px;
            max-width: 600px;
            margin: auto;
         }
         #form-signin-or-register {
            width: 600px;
            min-width: 600px;
            max-width: 600px;
            font-family: Verdana, Arial, Times New Roman;
            font-size: 24px;
            background: rgba(255, 238, 68, 0.1);
            margin: auto;
            height: auto;
            padding: 12px;
            text-shadow: 0px 0px 1px #000;
            border-radius: 25px;
            box-shadow: 0px 0px 10px #000;
            border: 5px solid rgba(255, 136, 0, 0.2);
         }
         #form-signin {
            margin-bottom: 0px;
         }
         .form-title {
            background: #ec0;
            padding: 5px 5px 10px 13px;
            margin-bottom: 10px;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #000;
            text-shadow: 0px 0px 5px #000;
            font-size: 58px;
         }
         .form-buttons {
            height: 40px;
            font-size: 58px;
            background: #F5EAAA;
            padding: 16px 5px 10px 13px;
            margin-bottom: 10px;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #000;
            text-shadow: 0px 0px 5px #000;
         }
         .form-field {
            background: #ddd;
            height: 51px;
            padding: 5px 5px 2px 5px;
            border-radius: 5px;
            box-shadow: 0px 0px 6px #000;
            margin-bottom: 10px;
         }
         .form-field-label-div {
            float: left;
            width: 245px;
            height: 31px;
            color: #ff0;
            background: #080;
            padding: 10px 5px 5px 5px;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 0px 0px 3px #000;
            text-shadow: 0px 0px 6px #000;
         }
         .form-field-input-div {
            background: #00f;
            width: 301px;
            margin-left: 5px;
            background: #f80;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 0px 0px 3px #000;
         }      
         .form-field-input {
            background: #ddf;
            margin: 5px;
            padding-top: 2px;
            padding-left: 5px;
            font-family: Verdana, Arial, 'Times New Roman';
            font-size: 24px;
            width: 290px;
            text-shadow: 0px 0px 1px #000;
         }
         #form-signin-div {
            padding: 12px;
         }
         .social-button {
            top: -16px;
         }
         #logo {
            height: 55px;
            width: 262px;
            top: 10px;
            left: 5px;
            z-index: 10;
            background: #ddd;
            border: 1px solid #000;
            padding: 7px;
            box-shadow: 0px 0px 5px #000;
            border-radius: 35px;
         }
         #logo-ts {
            float: left;
            top: -1px;
            left: -1px;
            background: #Fc0;
            height: 52px;
            width: 40px;
            padding: 0px 0px 0px 10px;
            box-shadow: 1px 1px 5px #888;
            border: 2px solid #f88;
            border-radius: 30px;
            margin-right: 13px;
         }
         .t {
            position: relative;
            float: left;
            font-family: Rockwell, Verdana, Arial;
            font-size: 40px;
            font-style: italic;
            color: #484;
            /* text-shadow: 1px 1px 5px #888; */
         }
         .s {
            position: relative;
            float: left;
            font-family: Copperplate, 'Copperplate Gothic Light', fantasy;
            font-size: 30px;
            font-style: oblique;
            font-weight: bold;
            top: 20px;
            left: -6px;
            color: #448;
            /* text-shadow: 1px 1px 5px #888; */
         }
      </style>
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
