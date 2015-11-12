<?php
session_start();

if ($_SESSION["ID"]) {
   header("Location: http://www.studddio.com/ts");
}

$operation = $_REQUEST["operation"];
if (!isset($operation))
   $operation = 'signin';

// echo "OPERATION: $operation <br/>";

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$firstname = $_REQUEST["firstname"];
$last_name = $_REQUEST["last-name"];

$form_register = null;
$form_login = null;
$provider_user_id = null;

switch ($operation) {
   case "signin":
      // echo "SIGNIN: $operation <br/>";
      if (isset($email) && isset($password)) {
         $link = linkDatabase() or die("Connection error!");
         $user = get_user_by_email_and_password($link, $email, $password);
         if ($user) {
            $_SESSION["user_connected"] = true;
            header("Location: http://www.studddio.com/index.php");
         } else {
            $error_msg = "Wrong nickname, email or password.";
            $form_login = formLogin();
         }
      } else {
         $form_login = formLogin();
      }
      break;
   case "social-sigin":
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
               header("Location: http://www.studddio.com/index.php");
            } else {
               $firstname = $user_profile->firstName;
               $last_name = $user_profile->lastName;
               $provider_user_id = $user_profile->identifier;
               //create_new_hybridauth_user($link, $email, $firstname, $last_name, $provider, $provider_user_id);
               $form_register = formRegister($provider, "", $firstname, $last_name, $email, $provider_user_id);
            }
         } else {
            $form_login = formLogin();
         }
      }
      break;
   case "register":
      $form_register = formRegister($provider, $firstname, $last_name, $provider_user_id);
      break;
   case "save-register":
      die("SAVE!");
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
   $str .= "<div class='pr fl form-field-input-div'><input id='$field_id' type='$field_type' name='$field_name' 
      value='$field_value' class='form-field-input'/></div>";
   $str .= "</div>";
   return $str;
}

function providersButtons() {
   $str = "<div class='pr fl or-use'>Or use</div>" .
           providerButton("facebook", "Facebook") .
           providerButton("twitter", "Twitter") .
           providerButton("linkedin", "Linkedin");
   return $str;
}

function providerButton($name, $title) {
   $str = "
      <div class='pr fl social-button'>
         <a href='signin.01a.php?provider=$name' rel='$title'>
            <img src='/img/social/01/png/long-shadow/32/$title.png' />
         </a>
      </div>";
   return $str;
}

function formLogin() {
   $nickname = formField("Nickname or Email", "text", "nickname", "nickname", "");
   $password = formField("Password", "text", "password", "password", "");
   $buttons = providersButtons();
   $str = "
      <form id='form-signin'>
         <div id='form-signin-div' class='pr'>
            <div class='form-title'>Sign-in</div>
            $nickname
            $password
            <div class='pr fl'><a id='signin' href='#' rel='Sign-in' class='pr button button-primary button-big'>Sign-in</a></div>
            <div class='pr fl ml5'><a id='register' href='#' rel='Sign-in' class='pr button button-primary button-big'>Register</a></div>
            $buttons
         </div>
      </form>";
   return $str;
}

function formRegister($provider, $nickname, $firstname, $last_name, $email, $provider_user_id) {
   $str = "
         <form id='form-register>
         <div id='form-register-div' class='pr'>
            <div class='form-title'>Register</div>";
   $str .= formField($provider, "Nickname", "text", "nickname", "nickname", $nickname);
   $str .= formField($provider, "First name", "text", "firstname", "firstname", $firstname);
   $str .= formField($provider, "Last name", "text", "lastname", "lastname", $last_name);
   $str .= formField($provider, "Email", "text", "email", "email", $email);
   if ($provider) {
      $str .= formField($provider, "Retype email", "text", "email2", "email2", "");
   }
   $str .= formField($provider, "Password", "password", "password", "password", "");
   $str .= formField($provider, "Password2", "password", "password2", "password2", "");
   $str .= "
            <div><a id='register' href='#' rel='Register' class='button button-primary button-small'>Register</a></div>
         </div>
      </form>";
   return $str;
}

function mysql_query_exec($link, $sql) {

   $result = mysql_query($link, $sql);

   if (!$result) {
      die(printf("Error: %s\n", mysql_error($link)));
   }

   return $result->fetch_object();
}

function get_user_by_email($link, $email) {
   return mysql_query_exec($link, "SELECT * FROM users WHERE email = '$email'");
}

function get_user_by_email_and_password($link, $email, $password) {
   return mysql_query_exec($link, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
}

function get_user_by_provider_and_id($link, $provider, $provider_user_id) {
   return mysql_query_exec($link, "
      SELECT * 
      FROM users 
      WHERE hybridauth_provider_name = '$provider' 
         AND hybridauth_provider_uid = '$provider_user_id'");
}

function create_new_hybridauth_user($link, $email, $firstname, $last_name, $provider, $provider_user_id) {
   $password = md5(str_shuffle("0123456789abcdefghijklmnoABCDEFGHIJ"));
   mysql_query_exec($link, "
      INSERT INTO users (
         email,
         password,
         firstname,
         last_name,
         hybridauth_provider_name,
         hybridauth_provider_uid,
         created_at)
      VALUES (
         '$email',
         '$password',
         '$firstname',
         '$last_name',
         $provider,
         $provider_user_id,
         NOW())"
   );
}
?>
<html>
   <head>
      <title>Login or Register</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width" />
      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/oslib/js/unicorn-ui.com/css/buttons.css" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script>
      <script>
         $(function() {
            $("#signin").click(function(e) {
               var form = $("#form-signin");
               var input = $("#form-signin-operation");
               input.val("signin");
               form.submit();
            });
            $("#register").click(function(e) {
               var form = $("#form-signin");
               var input = $("#form-signin-operation");
               input.val("save-register");
               form.submit();
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
            font-size: 12px
         }
         #login-or-register {
            width: 600px;
            min-width: 600px;
            max-width: 600px;
            font-family: Verdana, Arial, Times New Roman;
            font-size: 24px;
            background: #aaa;
            margin: auto;
            height: auto;
            padding: 20px;
            text-shadow: 0px 0px 1px #000;
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
            width: 280px;
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
            width: 269px;
            text-shadow: 0px 0px 1px #000;
         }
         #form-signin-div {
            padding: 23px;
         }
         .social-button {
            top: -16px;
         }
         #logo {
            height: 55px;
            width: 262px;
            top: 16px;
            left: 100px;
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
      <div id="logo" class="pr">
         <div id="logo-ts" class="pr">
            <div class='t' style='font-size: 46px;'>t</div><div class='s'>s</div>
         </div>
         <div id="logo-threescript" class="pr">
            <div class='t'>three</div><div class='s'>script</div>
         </div>
      </div>
      <div id="login-or-register" class="pr">
         <?
         if ($form_login) {
            echo $form_login;
         } elseif ($form_register) {
            echo $form_register;
         }
         ?>
         <!--div class="pr fl">
            <div class="pr fl">Or use</div>
            echo providersButtons();
         <!--div class="pr fl">
            <a href="signin.01a.php?provider=facebook" rel="Facebook">
               <img src="/img/social/01/png/long-shadow/32/Facebook.png" />
            </a>
         </div>
         <div class="pr fl">
            <a href="signin.01a.php?provider=twitter" rel="Twitter">
               <img src="/img/social/01/png/long-shadow/32/Twitter.png" />
            </a>
         </div>
         <div class="pr fl">
            <a href="signin.01a.php?provider=linkedin" rel="Linkedin">
               <img src="/img/social/01/png/long-shadow/32/Linkedin.png" />
            </a>
         </div>
      </div-->
      </div>
   </body>
</html>
<?
?>
