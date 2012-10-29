<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0054)http://localhost/wordpress/wp-login.php?loggedout=true -->
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title><? echo $titel;?></title>
<link rel="stylesheet" id="login-css" href="./login_files/login.css" type="text/css" media="all">
<link rel="stylesheet" id="colors-fresh-css" href="./login_files/colors-fresh.css" type="text/css" media="all">
<script type="text/javascript" src="js/prototype.js"></script>
<meta name="robots" content="noindex,nofollow">
</head>
<body>
<div id="login"><img src="banner/logopariwisata.jpg"  width="326">
<form name="loginform" id="loginform"  method="post">
	<p>
		<label>Username<br>
		<input type="text" name="log" id="log" class="input" value="" size="20" tabindex="10"></label>
	</p>
	<p>
		<label>Password<br>
		<input type="password" name="pwd" id="pwd" class="input" value="" size="20" tabindex="20"></label>
	</p>
	<p class="submit">
		<input type="button" name="tsubmit" id="tsubmit" class="button-primary" onClick="masuk();" value="Log In" tabindex="100">
	</p>
</form>
</div>
<script language="JavaScript" type="text/javascript">
function masuk(){
if ($F('log').length==0)
{
	$('log').focus();
	alert('Isi User Name');
} else if ($F('pwd').length==0)
{
	$('pwd').focus();
	alert('Isi Password');
}	else {
	var url="pilogin";
	new Ajax.Request(url, {
		method: 'post',
		parameters: { a: $F('log'),b: $F('pwd') },
		onSuccess: function(transport) {
			if (transport.responseText=='1')
			{
				$('loginform').action="menuawal";
				$('loginform').submit();
				
			} else {
				alert(transport.responseText);
			}
		}
	});
}
}

document.onkeydown = checkKeycode;
function checkKeycode(e) {
  var keycode;
  if (window.event) keycode = window.event.keyCode;
  else if (e) keycode = e.which;
  if(keycode == 13){
    masuk();
  }
}
</script>
</body></html>