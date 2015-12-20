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
         if ($user) {
            $nickname_bd = $user["nickname"];
            $email_bd = $user["email"];
            $password_crypt = cryptPassword($nickname_bd, $password);
            $ok = ($password_crypt === $user["password"]);
            if ($ok) {
               $confirmkey = $user["confirmkey"];
               $confirmdate = $user["confirmdate"];
               $confirmed = $confirmdate && ($confirmkey === md5($nickname_bd . $email_bd));
               if ($confirmed) {
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
                  $form = formNotConfirmedBS($nickname_bd, $email_bd);
               }
            }
         } else {
            $error_msg = _("Wrong nickname, email or password.");
            $form = formSigninBS();
         }
      } else {
         $form = formSigninBS();
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
            $form = formSigninBS();
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
            $form = formSigninBS();
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
         $form = formConfirmBS($nickname, $email);
      }
      break;

   case "confirm":

      $key = $_REQUEST["key"];

      if (!(empty($email) || empty($key))) {
         $link = linkDatabase() or die(_("Connection error!"));
         $qry = get_user_by_email($link, $email);
         $user = mysql_fetch_assoc($qry);
         $nickname_db = $user["nickname"];
         $firstname_db = $user["firstname"];
         $email_db = $user["email"];
         $key_md5 = md5($nickname_db . $email_db);
         $confirm_key = $user["confirmkey"];
         $confirm_date = $user["confirmdate"];
         if (($key_md5 === $confirm_key) && ($confirm_date)) {
            $form = formSigninBS();
         } else {
            if ($key_md5 === $key) {
               $updated = update_confirmed_user($link, $nickname_db, $email_db, $key_md5);
               if ($updated) {
                  sendConfirmedEmail($nickname_db, $firstname_db, $email_db);
                  $form = formConfirmedBS();
               } else {
                  $form = "Occured a database error, please contact 'master@threescript.com'";
               }
            } else {
               $form = "Wrong data. Please enter in contact with 'master@threescript.com'.";
            }
         }
      }
      break;

   case "send-again":
      sendRegisterEmail($nickname, $firstname, $email);
      $form = formConfirmBS();
      break;

   case "test-register-email":

      sendRegisterEmail("betobyte", "Roberto", "betobyte@gmail.com");
      die('test-register-email finished.');
      break;

   default:

      $form = formSigninBS();
      break;
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
