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
         setcookie(session_name(), '', time() - 42000, '/');
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


<!--form class="form-horizontal">
   <fieldset>

      <!-- Form Name -- >
      <legend>Form Name</legend>

      <!-- Text input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="id-nickname">Nickname.</label>  
         <div class="col-md-4">
            <input id="id-nickname" name="id-nickname" type="text" placeholder="Type your nickname." class="form-control input-md" required="">
            <span class="help-block">Use only lower letters and number, at least four.</span>  
         </div>
      </div>

      <!-- Text input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="id-first-name">First Name</label>  
         <div class="col-md-4">
            <input id="id-first-name" name="id-first-name" type="text" placeholder="Type your first name here." class="form-control input-md" required="">
            <span class="help-block">Use at least 3 alfa chars.</span>  
         </div>
      </div>

      <!-- Text input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="id-lastname">Last Name</label>  
         <div class="col-md-4">
            <input id="id-lastname" name="id-lastname" type="text" placeholder="Type your last name here." class="form-control input-md" required="">
            <span class="help-block">Use at least 3 alfa chars.</span>  
         </div>
      </div>

      <!-- Text input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="email">Email</label>  
         <div class="col-md-4">
            <input id="email" name="email" type="text" placeholder="Type your email." class="form-control input-md" required="">
            <span class="help-block">Type your email to confirm the register.</span>  
         </div>
      </div>

      <!-- Text input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="id-repeat-email">Repeat Email</label>  
         <div class="col-md-4">
            <input id="id-repeat-email" name="id-repeat-email" type="text" placeholder="Retype your email here." class="form-control input-md" required="">
            <span class="help-block">Type the email again equal previous.</span>  
         </div>
      </div>

      <!-- Password input-- >
      <div class="form-group">
         <label class="col-md-4 control-label" for="id-password">Password</label>
         <div class="col-md-4">
            <input id="id-password" name="id-password" type="password" placeholder="Type your password here." class="form-control input-md" required="">
            <span class="help-block">Use lower and upper letters, numbers and non-alfanum chars.</span>
         </div>
      </div>

   </fieldset>
</form-->
