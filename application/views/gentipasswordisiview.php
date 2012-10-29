<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><? echo $titel;?></title>
<link rel="stylesheet" href="login_files/load-styles.css" type="text/css" media="all">
<link rel="stylesheet" id="colors-css" href="login_files/colors-fresh.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" media="all" href="login_files/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='login_files/ie.css?ver=20110711' type='text/css' media='all' />
<![endif]-->
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<script type="text/javascript" src="login_files/l10n.js"></script>
<script type="text/javascript" src="login_files/load-scripts_002.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/control_input.js"></script>
</head>


<body class="home blog single-author two-column right-sidebar">
	
<div id="page" class="hfeed">
<?=$menuatas?>
	<div id="main">
		<div id="primary">
			<div id="content" role="main">
<center><h1><font color="blue">Ganti Password</font></h1></center>

<table class="wp-list-table widefat posts" cellspacing="0">
<thead>
<tr>
	<th colspan="3">&nbsp;</th>
</tr>
<?=$formisi?>
</thead>
</table>

			</div><!-- #content -->
		</div><!-- #primary -->
	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
								<? echo $pembuat;?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script language="JavaScript" type="text/javascript">
function masuk(){
if ($F('passlama').length==0||$F('passbaru').length==0||$F('passbaru1').length==0)
	alert('Isi semua kolom');
else if ($F('passbaru')!=$F('passbaru1'))
	alert('Ulangi Password baru tidak sama');
else 
{
	var url="gentipasswordisi";
	new Ajax.Request(url, {
		method: 'post',
		parameters: { a: $F('passlama'),btsimpan:'cek'},
		onSuccess: function(transport) {
			if (transport.responseText=='y')
			{
				new Ajax.Request(url, {
					method: 'post',
					parameters: { a: $F('passbaru1'),btsimpan:'save',b:$F('passlama')},
					onSuccess: function(transport) {
						$('passlama').value='';
						$('passbaru').value='';
						$('passbaru1').value='';
						alert('Password baru tersimpan');
					}
				});
				
			} else {
				alert('Password lama salah');
			}
		}
	});
}
}
</script>
</body></html>