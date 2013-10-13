<?php
require_once("config.php");
$code = (int)(rand(0,1000000));
?>
<body>
<div class='reveal'>

<link rel="stylesheet" href="css/reveal.min.css">
<link rel="stylesheet" href="css/theme/twilio.css" id="theme">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://js.pusher.com/1.12/pusher.min.js" type="text/javascript"></script>


<style>
  #twofa_code {
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
  var code = '<?php echo $code; ?>';
  var number = '<?php echo MY_PHONE_NUMBER;?>';
  var username = "<?php echo MY_USERNAME; ?>";

  var validCode = function(digits) {
    return (parseInt(digits,10) === parseInt(code,10));
  }

  var receiveDigits = function(digits) {
    if (validCode(digits) === true) {
      loginOne();
    } else {
      alert("Nope, no user found here...");
    }
  }


  var loginOne = function() {
    $('#standard').slideUp();
    $('#twofa_code').slideDown();
  }

  var pusher = new Pusher('efa61030395bf0550164');
  var channel = pusher.subscribe('2FA_demo');
  channel.bind('new_call', function(data) {
    receiveDigits(data.Digits);
  });




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
  <h3>Call this number:<br/><?php echo TWILIO_NUMBER; ?></h3>
  <h2>Code: <span class='t'><?php echo $code; ?>#</span></h2>
</form>

<form id="twofa_code">
  <h2>
      Hey <span class='t'><?php echo MY_USERNAME;?></span>!<br/>Welcome back
  </h2>
</form>


</div>



  </body>