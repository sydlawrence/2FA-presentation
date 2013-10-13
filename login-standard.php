<?php
require_once("config.php");
?>
<body>

<div class='reveal'>

<link rel="stylesheet" href="css/reveal.min.css">
<link rel="stylesheet" href="css/theme/twilio.css" id="theme">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<style>
  #twofa_code, #third_login {
    display:none;
  }
  .reveal {
    font-size:14px;
  }
  form {
    padding-top:10px;
    text-align:center;
    font-size:2em;
  }
  .reveal p {
    display:block;
    line-height:1.5em;
  }
  .reveal label {
    display:block;
    font-weight:normal;
    font-size:2em;
      font-family: "Gotham Ultra", Impact, sans-serif;
  }
  .reveal input {
    font-size:1em;
  }
  input {
    border-radius:10px;

  }
  button {
    border-radius:10px;
    border:none;
    background:red;
    color:#fff;
    -webkit-transition:500ms all;
    transition:500ms all;
    border:1px solid red;
      font-family: "Gotham Ultra", Impact, sans-serif;
  padding:8px 20px;
      font-size:2em;
  }
  button:hover {
    border:1px solid red;
    color:red;
    background:#fff;
  }
</style>
<script>
var code = "WJEKC";
  var loginOne = function() {
    $('#standard').slideUp();
    $('#twofa_code').slideDown();
    $.getJSON("sendSMS.php");
  }

  var loginTwo = function() {
    if ($('#code').val() !== code) {
      alert("Incorrect code, are you really <?php echo MY_USERNAME;?>?");
    } else {
      $('#third_login').slideDown();
      $('#twofa_code').slideUp();
    }
  }

$(function() {


  $('#standard').submit(function(e) {
    e.preventDefault();
    loginOne();
  });

  $('#twofa_code').submit(function(e) {
    e.preventDefault();
    loginTwo();

  });
});



</script>



<form id="standard">
  <p>
    <label>
      Username
      <input type="text" name="username"/>
    </label>
  </p>
  <p>
    <label>
      Password
      <input type="password" name="password"/>
    </label>
  </p>
  <p>
    <button type="submit">Login</button>
  </p>
</form>

<form id="twofa_code">
  <p style="font-size:2em;margin-bottom:0.5em;">
    Hey <?php echo MY_USERNAME;?>, you will receive an sms<br/>with your auth code.
  </p>
  <p>
    <label>
      Auth Code
      <input type="text" name="code" id="code"/>
    </label>
  </p>
  <p>
    <button type="submit">Login</button>
  </p>
</form>

<form id="third_login">
  <h2>
      Hey <span class='t'><?php echo MY_USERNAME;?></span>!<br/>Welcome back
  </h2>
</form>


</div>



  </body>