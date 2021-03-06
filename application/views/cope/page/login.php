<style type="text/css">
  /**
 * #.# wp-login CSS overwrites
 *
 * These selectors overwrite the core css on the wp-login page
 */

  body.login {
    /* Using flexbox to control the vertical alignment of the form and white box */
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
  }

  /* Don't use Flex alignments for the registration pages, doesn't play nice with content that exceeds the window height  */
  body.route-register,
  body.route-register-profile,
  body.route-register-confirm {
    display: block;
    margin-top: 100px;
  }

  .login-action-lostpassword.login .message,
  .login-action-rp.login .message,
  .login-action-login.login .message,
  .login .message.reset-pass {
    border-left: none;
    background-color: transparent;
    color: #555D66;
    padding: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  .wp-core-ui .button-primary,
  .wp-core-ui.login .button-primary {
    width: 100%;
    height: 40px;
    font-size: 14px;
  }

  #backtoblog {
    display: none;
  }

  #pass-strength-result {
    background: #FFF;
  }

  #pass-strength-result.strong {
    background-color: #FFF;
    border-color: transparent;
    color: #46b450;
    /* Green */
    -webkit-box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -100px 0 #46b450,
      inset 100px 0 #46b450;
    box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -100px 0 #46b450,
      inset 100px 0 #46b450;
  }

  #pass-strength-result.good {
    background-color: #FFF;
    border-color: transparent;
    color: #ffb900;
    /* Orange */
    -webkit-box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -80px 0 #ffb900,
      inset 80px 0 #ffb900;
    box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -80px 0 #ffb900,
      inset 80px 0 #ffb900;
  }

  #pass-strength-result.bad,
  #pass-strength-result.short {
    background-color: #FFF;
    border-color: transparent;
    color: #dc3232;
    /* Red */
    -webkit-box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -80px 0 #dc3232,
      inset 80px 0 #dc3232;
    box-shadow:
      inset 0 14px #FFF,
      inset 0 -14px #FFF,
      inset -80px 0 #dc3232,
      inset 80px 0 #dc3232;
  }

  .reset-pass {
    margin-bottom: 0;
  }

  #loginform {
    margin: 0 !important;
    padding: 0 !important;
    background: transparent !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
  }

  #login form p {
    margin: 0;
  }

  /**
 * #.# Basic CSS
 *
 * The rest of the CSS is for all login pages.
 */

  body {
    color: #555D66;
    font-size: 14px;
  }

  * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  a {
    color: #555D66 !important;
    text-decoration: underline !important;
    font-weight: normal;
    outline: 0;
  }

  a:hover,
  a:active {
    text-decoration: underline;
  }

  h2 {
    font-size: 1.5em;
  }

  p {
    line-height: 1.5;
    margin-bottom: 1em;
  }

  strong {
    font-weight: bolder;
  }

  .small {
    font-size: 12px;
    font-weight: normal;
  }

  .center {
    text-align: center;
  }

  .wp-core-ui .button-primary {
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  .singleline {
    position: relative;
    left: -12px;
    width: 278px;
  }

  #login {
    width: 350px;
    padding: 24px;
    top: 40px;
    margin: 0 auto 0;
    background: #FFF;
    position: relative;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
    box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
  }

  #login h1 {
    text-align: center;
    margin-bottom: 24px;
    position: absolute;
    top: -92px;
    width: 100%;
    left: 0;
  }

  #login h1 a {
    background-image: url(<?php echo BASE_URL;?>static/images/share/icon/main-logo.png);
    -webkit-background-size: 256px;
    background-size: 256px;
    background-position: center top;
    background-repeat: no-repeat;
    color: #999;
    height: 76px;
    margin: 0 auto;
    padding: 0;
    width: auto;
    text-indent: -9999px;
    outline: none;
    overflow: hidden;
    display: block;
    -webkit-transition: none;
    transition: none;
  }

  p.intro,
  #login .message {
    margin-bottom: 24px !important;
  }

  #login .message+#login_error {
    margin-top: 0 !important;
    border-top: 1px solid #f5f5f5;
  }

  #login #login_error {
    border-left: 4px solid #00a0d2;
    padding: 12px;
    margin: -24px 0 24px -24px;
    background-color: #fbfbfb;
    width: 350px;
    border-bottom: 1px solid #f5f5f5;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
  }

  #login #login_error {
    border-left-color: #dc3232;
  }

  #login #nav {
    font-size: 13px;
    padding: 0;
    margin: 24px auto;
    text-align: center;
    position: absolute;
    left: 0;
    bottom: -68px;
    width: 100%;
  }

  .login form {
    margin: 0 !important;
    padding: 0 !important;
    background: transparent !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    overflow: visible;
  }

  .mobile #login {
    padding: 24px;
  }

  .container {
    padding: 0 0 64px;
    margin-top: 24px;
  }

  form {
    margin-top: 24px;
  }

  form p {
    margin-bottom: 0;
  }

  form .forgetmenot,
  form .login-remember {
    font-weight: normal;
    margin-bottom: 16px !important;
  }

  form .forgetmenot label,
  form .login-remember label {
    font-size: 12px;
    line-height: 1;
    cursor: pointer;
  }

  form .submit {
    margin: 8px 0 0 0 !important;
    padding: 0;
  }

  form input[type="text"],
  form input[type="password"] {
    width: 100%;
    padding: 3px 10px;
    margin: 2px 6px 16px 0;
    height: 40px;
    color: #23282d;
    font-weight: 400;
  }

  #loginform p.submit,
  .login-action-lostpassword p.submit {
    border: none;
  }

  .login #pass-strength-result {
    font-weight: 600;
    margin: -1px 5px 16px 0;
    padding: 6px 5px;
    text-align: center;
    width: 100%;
  }

  body.route-register input.input,
  body.route-register-profile input.input,
  body.route-register-confirm input.input {
    margin-bottom: 0;
  }

  body.route-register #login form p,
  body.route-register-profile #login form p,
  body.route-register-confirm #login form p {
    margin-bottom: 16px;
  }

  body.login form input.input::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    opacity: 0.5;
  }

  body.login form input.input::-moz-placeholder {
    /* Firefox 19+ */
    opacity: 0.5;
  }

  body.login form input.input:-ms-input-placeholder {
    /* IE 10+ */
    opacity: 0.5;
  }

  body.login form input.input:-moz-placeholder {
    /* Firefox 18- */
    opacity: 0.5;
  }

  body.login form input.error {
    background-color: #FAE5E8;
    border: 3px solid #D42A41;
  }

  body.login form input.good {
    border-color: #83c373;
  }

  body.route-register #login .message,
  body.route-register-profile #login .message,
  body.route-register-confirm #login .message {
    margin-left: -24px;
    padding-left: 24px;
    padding-right: 0;
  }

  body.route-register #login .message.error,
  body.route-register-profile #login .message.error,
  body.route-register-confirm #login .message.error {
    border-left-color: #dc3232;
    margin-bottom: auto !important;
  }

  body.route-register .message.error .avatar {
    float: left;
    border-radius: 50%;
    margin-right: 1em;
  }

  body.route-register-profile #login .message.info {
    margin-top: -24px;
    width: 350px;
  }

  body.route-register-profile #login .message.info,
  body.route-register-profile p.intro {
    margin-bottom: 1em !important;
  }

  form .login-mailinglist label {
    font-size: 12px;
    cursor: pointer;
  }

  form .login-mailinglist label input {
    float: left;
    margin: 0.5em 0.5em 0 0;
  }

  /* Clearfix for the forms, allows for non-flex-mode #login div to stretch over the submit button */
  form:before,
  form:after {
    content: "";
    display: table;
    border-collapse: collapse;
  }

  form:after {
    clear: both;
  }

  form {
    min-height: 0;
    /* clearfix IE7 support */
  }

  @media (max-width:375px) {

    body,
    html {
      background: #FFF;
    }

    body.login {
      display: block;
      /* Overwriting flexbox to remove vertical positioning */
      align-items: center;
      margin-top: 100px;
      /* Fix for displaying logo correctly */
    }

    #login,
    .mobile #login {
      -webkit-box-shadow: none;
      box-shadow: none;
      padding: 24px;
    }

    #login #login_error {
      margin-left: 0;
      width: 100%;
    }
  }

  @media (max-width:360px) {
    #login {
      width: 100%;
      padding: 20px 24px;
    }

    #login h1 {
      padding: 0 24px 24px;
    }

    #login h1 a {
      -webkit-background-size: 100%;
      background-size: 100%;
    }
  }

  /* Disable flex display on smaller screens, as it cuts off the centered content */
  @media (max-height: 550px) {
    body.login {
      display: block;
      margin-top: 100px;
    }
  }
</style>
 
<div id="login" style="    height: 350px;">
  <!-- <h1><a href="<?php //echo BASE_URL;?>" title="<?php //echo BASE_URL;?>" tabindex="-1"><?php //echo BASE_URL;?> Login</a></h1> -->
  <!-- <p class="intro">Log in to your <?php //echo BASE_URL;?> account to contribute to <?php //echo BASE_URL;?>, get help in the support forum, or rate and review themes and plugins.</p> -->


  <form name="loginform" id="loginform" action="<?php echo BASE_URL;?>admin/loginchk" method="post">

    <p class="login-username">
      <label for="user_login">Username</label>
      <input type="text" name="log" id="user_login" class="input" value="" size="20">
    </p>
    <p class="login-password">
      <label for="user_pass">Password</label>
      <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
    </p>

    <!-- <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
        me</label></p> -->
    <p class="login-submit">
      <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log in">
    </p>
  
  </form>

  <script type="text/javascript">
    setTimeout(function () {
      try {
        d = document.getElementById('user_login');
        d.focus();
        d.select();
      } catch (e) {}
    }, 200);
  </script>


</div>