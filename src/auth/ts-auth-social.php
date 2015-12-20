<?php

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
