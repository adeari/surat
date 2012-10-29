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
<center><h1><font color="blue">Data Karyawan</font></h1></center>

<table class="wp-list-table widefat posts" cellspacing="0">
<thead>
<tr>
	<th colspan="3">&nbsp;</th>
</tr>
<?=$menuisi?>
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
function tambah(){
	var kunci=$F('txnip')
	if (kunci.length<1) {
		alert('NIP tidak boleh KOSONG...');
	} else {
	var url="isiuserlist";
		new Ajax.Request(url, {
			method: 'post',
			parameters: { bttambah: $F('bttambah'),
			nip:kunci,
			nama:$F('txnama'),
			aktif:$F('optaktif'),
			userid:$F('txuserid'),
			t4lahir:$F('txt4lahir'),
			tgllahir:$F('txtgllahir'),
			alamat:$F('txalamat'),
			telepon:$F('txtelepon'),
			tglmasuk:$F('txttglmasuk'),
			agama:$F('txtagama'),
			stsipil:$F('optstatussipil'),
			omaster:$F('optmaster'),
			osurat:$F('optsurat'),
			olaporan:$F('optlaporan'),
			outility:$F('optutility'),
			useridkita:$('isiform').useridkita.value,
			opthakakses:$F('opthakakses'),
			pilihankita:$('isiform').pilihankita.value
			},
			onSuccess: function(transport) {
				if (transport.responseText=='Data Karyawan ini tersimpan')
				{
					$('isiform').submit();
				}
				alert(transport.responseText);
			}
		});
	}
}

function batal() {
	$('isiform').submit();
}
</script>
<iframe name="gToday:normal:login_files/agenda.js" id="gToday:normal:login_files/agenda.js" src="ipopeng" style="visibility: visible; z-index: 999; position: absolute; left: -500px; top: 219px; width: 174px; height: 174px;" frameborder="0" height="189" scrolling="no" width="174"></iframe>
</body></html>