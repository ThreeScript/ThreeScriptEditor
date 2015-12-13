<?php
/* ---------------------------------------------------------------------------- */

$operation = $_REQUEST["operation"];
if (!isset($operation))
   $operation = 'none';

if ($_SESSION["ID"] && ($operation !== 'signout'))
   header("Location: ?");

$nickname_or_email = $_REQUEST["nickname_or_email"];
$nickname = $_REQUEST["nickname"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$email2 = $_REQUEST["email2"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];

$form = null;
$provider_user_id = null;

switch ($operation) {

   case "signout":

      $_SESSION = array();
      if (isset($_COOKIE[session_name()]))
         setcookie(session_name(), '', time() - 42000, '/');
      session_destroy();
      header("Location: ?");
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
            header("Location: ?");
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
               header("Location: ?");
            } else {
               $firstname = $user_profile->firstName;
               $lastname = $user_profile->lastName;
               $provider_user_id = $user_profile->identifier;
               //create_new_hybridauth_user($link, $email, $firstname, $lastname, $provider, $provider_user_id);
               $form = formRegisterBS($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
            }
         } else {
            $form_login = formLogin();
         }
      }
      break;

   case "register":

      $form = formRegisterBS($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
      break;

   case "save-register":

      $ok = !(empty($nickname) ||
              empty($firstname) ||
              empty($lastname) ||
              empty($password) ||
              empty($password2) ||
              empty($email) ||
              empty($email2));
      if ($ok) {
         $link = linkDatabase() or die("Connection error!");
         $ok = create_new_user($link, $nickname, $firstname, $lastname, $email, $password);
      }
      if (!$ok) {
         $form = formRegisterBS($provider, $nickname, $firstname, $lastname, $email, $provider_user_id);
      } else {
         sendRegisterEmail($nickname, $firstname, $email);
         $form = formConfirmEmail($nickname, $email);
         // header("Location: ?");
      }
      break;

   case "confirm":

      $key = $_REQUEST["key"];
      if (md5($nickname, $email) === $key) {
         sendConfirmedEmail();
         $form = formConfirmed();
      }
      break;

   case "test-register-email":

      sendRegisterEmail("betobyte", "Roberto", "betobyte@gmail.com");
      die('test-register-email finished.');
      break;

   default:

      $form_login = formLogin();
      break;
}

/** ----------------------------------------------------------------------------
 * @param type $nickname
 * @param type $email
 * @param type $key
 * -----------------------------------------------------------------------------
 */
function sendRegisterEmail($nickname, $firstname, $email) {
   $url = "www.threescript.com?auth&operation=confirm&email={EMAIL}&key={KEY}";
   $key = md5($nickname . $email);
   $template_php = true;
   if ($template_php) {
      $template_html = createRegisterTemplate($url, $key, 'html');
      $template_txt = createRegisterTemplate($url, $key, 'txt');
   } else {
      $filedir = 'master/ThreeScriptTools/src/mail/templates';
      $filename ='register_template';
      $root = $_SERVER['DOCUMENT_ROOT'] . "/$filedir";
      $template_html = file_get_contents("$root/$filename.html");
      $template_txt = file_get_contents("$root/$filename.txt");
   }
   $info = array(
       'nickname' => $nickname,
       'firstname' => $firstname,
       'email' => $email,
       'key' => $key,
       'html' => format_email($template_html),
       'txt' => format_email($template_txt)
   );
   echo format_email($template_html);
   echo format_email($template_txt);
   die();
   $res = send_email($info);
   if ($res) {
      echo "the email was sent to $email";
   } else {
      echo "the email wasn't sent to $email: '$res'";
   }
}

/** ----------------------------------------------------------------------------
 * @return string
 * -----------------------------------------------------------------------------
 */
function formLogin() {
   $operation = "<input id='operation' type='hidden' name='operation' value=''>";
   $nickname = formField(_("Nickname or Email"), "text", "nickname_or_email", "nickname_or_email", "");
   $password = formField(_("Password"), "password", "password", "password", "");
   $buttons = providersButtons();

   $str = "
      <form id='id-form-signin' action='?' method='post'>
         <div id='id-div-form-signin-div' class='pr'>
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

/** ----------------------------------------------------------------------------
 * @param type $provider
 * @param type $nickname
 * @param type $firstname
 * @param type $lastname
 * @param type $email
 * @param type $provider_user_id
 * @return string
 * -----------------------------------------------------------------------------
 */
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
      <form id='id-form-register' action='?' method='post'>
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

/** ----------------------------------------------------------------------------
 * @param type $provider
 * @param type $nickname
 * @param type $firstname
 * @param type $lastname
 * @param type $email
 * @param type $provider_user_id
 * @return string
 * -----------------------------------------------------------------------------
 */
function formRegisterBS($provider, $nickname, $firstname, $lastname, $email, $provider_user_id) {
   $auth = "<input type='hidden' name='auth'>";
   $operation = "<input id='operation' type='hidden' name='operation' value=''>";
   $nickname = formRowFieldBS(_("Nickname"), "text", "nickname", "nickname", "", "form-group", "glyphicon-user", _("Type your nickname."), _("Use at least four alphanumeric characters, without spaces and the first alfa."));
   $firstname = formRowFieldBS(_("First Name"), "text", "firstname", "firstname", $firstname, "col-sm-6 form-group", null, _("Type your first name."), _("Use at least two alphabetic characters."));
   $lastname = formRowFieldBS(_("Last Name"), "text", "lastname", "lastname", $lastname, "col-sm-6 form-group", null, _("Type your last name"), _("Use at least two alphabetic characters."));
   $email = formRowFieldBS(_("Email"), "text", "email", "email", $email, "col-sm-6 form-group", "glyphicon-envelope", _("Type your email."), _("Valid email."));
   if ($provider)
      $email2 = "";
   else
      $email2 = formRowFieldBS(_("Retype Email"), "text", "email2", "email2", "", "col-sm-6 form-group", null, _("Retype your email."), _("Retype the valid email."));
   $password = formRowFieldBS(_("Password"), "password", "password", "password", "", "col-sm-6 form-group", "glyphicon-lock", _("Type your password"), _("Use at least one uppercase letter, one lowercase letter, one number and one non-alphanumeric character."));
   $password2 = formRowFieldBS(_("Retype Password"), "password", "password2", "password2", "", "col-sm-6 form-group", null, _("Retype your password."), _("Retype the password the same as the previous one."));

   $buttons = providersButtons();

   $str = "
      <h1 class='well' style='position: absolute; margin-top: 0px;'>" . _("Register") . "</h1>
      <div class='col-lg-12 well' style='position: absolute; top: 100px;'>
         <form id='id-form-register' action='?' method='post' role='form'>
            <div class='col-sm-12'>
               $auth
               $operation
               $nickname
               <div class='row'>
                  $firstname
                  $lastname
               </div>
               <div class='row'>
                  $email
                  $email2
               </div>
               <div class='row'>
                  $password
                  $password2
               </div>
               <a id='save-register' href='#' class='btn btn-primary'>" . _("Save Register") . "</a>
               <a id='signin' href='#' class='btn btn-primary'>" . _("Sign In") . "</a>
               $buttons
            </div >
         </form>
      </div >";
   return $str;
}

/** ----------------------------------------------------------------------------
 * @return string
 * -----------------------------------------------------------------------------
 */
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

/** ----------------------------------------------------------------------------
 * @param type $name
 * @param type $title
 * @return type
 * -----------------------------------------------------------------------------
 */
function providerButton($name, $title) {
   $str = "
      <div class='pr fl social-button'>
         <a href='login.01b.php?operation=social-signin&provider=$name' rel='$title'>
            <img src='/img/social/01/png/long-shadow/32/$title.png' />
         </a>
      </div>";
   return $str;
}

/* -------------------------------------------------------------------------- */
?>

<html>
   <head>
      <title><? echo _('Signin or Register'); ?></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width" />
      <link href="/oslib/js/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
      <!--link href="/oslib/js/unicorn-ui.com/css/font-awesome.min.css" rel="stylesheet" />
      <link href="/oslib/js/unicorn-ui.com/css/buttons.css" rel="stylesheet" />
      <script src="/oslib/js/unicorn-ui.com/js/buttons.js"></script-->
      <?= "<link href='$threescriptEditorSrcDir/auth/ts-auth.css'  rel='stylesheet'/>" ?>
   </head>
   <body>
      <div id="id-nav" class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div id='id-logo' class='top-div-item_vaimorre navbar-header'>
               <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>               
               <!--a id="HTFont" class="navbar-brand" href="#">ThreeScript</a-->
               <img id='img-logo' src='/img/ts/logo/logo.01a.127x33.png'>
            </div>
         </div>
      </div>
      <section class="block">
         <div class="container">
            <div id="id-signin-or-register" class="panel-body" role="main">
               <?
               if ($form) {
                  echo $form;
               }
               ?>
            </div>
         </div>
      </section>
      <script src="/oslib/js/jquery/jquery-1.11.3.js"></script>
      <script src="/oslib/js/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <?= "<script src='$threescriptEditorSrcDir/auth/ts-auth.js'></script>" ?>
   </body>
</html>
