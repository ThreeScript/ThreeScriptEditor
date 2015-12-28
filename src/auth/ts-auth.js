
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
   var re = /^[a-zA-Z0-9]+$/;
   var ok = re.test(nickname);
   return ok;
}

function validateName(name, minLength) {
   if (name.length < minLength)
      return false;
   var re = /^[a-zA-Z\u00C0-\u017F][a-zA-Z\u00C0-\u017F\s]+$/i;
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
   var ok = validateName(val, 2);
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

function submitForm(formId, inputOperation, inputValue) {
   var form = $("#" + formId);
   var input = $("#" + inputOperation);
   if (inputOperation)
      input.val(inputValue);
   form.submit();
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

   $("#btn-signin").click(function() {
      submitForm("id-form-auth", "operation", "signin");
   });

   $("#btn-register").click(function() {
      submitForm("id-form-auth", "operation", "register");
   });

   $("#btn-save-register").click(function() {
      if (testNickname(nickname, false) && testName(firstname, false) &&
              testName(lastname, false) && testEmail(email, false) &&
              testRetypeEmail(email, email2, false) && testPassword(email, false) &&
              testRetypePassword(email, email2, false)) {
         submitForm("id-form-auth", "operation", "save-register");
      }
   });

   $("#btn-send-again-email-confirm-register").click(function() {
      submitForm("id-form-auth", "operation", "send-again-email-confirm-register");
   });

   $("#btn-email-register-key").click(function() {
      submitForm("id-form-auth", "operation", "email-register-key");
   });

   $("#btn-change-password").click(function() {
      submitForm("id-form-auth", "operation", "change-password");
   });
   
   $("#btn-home").click(function() {
      submitForm("id-form-auth", "operation", "home");
   });
   
   $("#btn-confirm-change-password-with-password").click(function() {
      submitForm("id-form-auth", "operation", "confirm-change-password-with-old-password");
   });
});
