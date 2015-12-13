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

function formFieldBS($field_title, $field_type, $field_id, $field_name, $field_value, $glyphicon) {
   $str = "
      <div class='input-group'>
         <span class='input-group-addon'><i class='glyphicon $glyphicon'></i></span>
         <input id='$field_id' type='$field_type' name='$field_name' 
            value='$field_value' placeholder='$field_title' class='form-control'/>
      </div>";
   return $str;
}

function formRowFieldBS($field_title, $field_type, $field_id, $field_name, $field_value, $class, $glyphicon, $place_holder, $help) {
   $str = "
      <div class='$class'>
         <label>$field_title</label>";
   if (true && ($glyphicon))
      $str .= "      
         <div class='input-group'>
            <span class='input-group-addon'><i class='glyphicon $glyphicon'></i></span>
            <input id='$field_id' type='$field_type' name='$field_name' 
               value='$field_value' placeholder='$place_holder' class='form-control'/>
         </div>";
else
   $str .= "
         <input id='$field_id' type='$field_type' name='$field_name' 
                  value='$field_value' placeholder='$place_holder' class='form-control'/>";
$str .= "
         <p class='help-block'>$help</p>
      </div>";
   return $str;
}

?>
