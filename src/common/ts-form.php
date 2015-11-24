<?php

function formField($field_title, $field_type, $field_id, $field_name, $field_value) {
   $str = "<div class='pr form-field'>";
   $str .= "<div class='pr fl form-field-label-div'>$field_title</div>";
   $str .= "<div class='pr fl form-field-input-div'>
      <input id='$field_id' type='$field_type' name='$field_name' 
      value='$field_value' placeholder='$field_title' class='form-field-input'/></div>";
   $str .= "</div>";
   return $str;
}

?>
