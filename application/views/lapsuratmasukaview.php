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
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>

<body class="home blog single-author two-column right-sidebar">
<div id="page" class="hfeed">
<?=$menuatas?>
	<div id="main">
		<div id="primary">
			<div id="content" role="main">
				<center><h1><font color="blue">Laporan Surat Masuk</font></h1></center>
<br/><br/><br/>
				<center>
Dari Tanggal : <input type="text" name="dari" id="dari" size="12" maxlength="10" onFocus="this.setStyle({ background: 'yellow' });MaskedTextBox_NS_FocusMask(event, this.id, '99/99/9999');" onkeyup="date_entry_new(this,event);" onBlur="this.setStyle({ background: 'white' });" onkeypress="return date_input(this.id,this.name,event);" onChange="date_validation(this);"  /><a href="javascript:void(0)" onclick="gfPop.fPopCalendar($('dari'));return false;"><img name="popcal" src="login_files/tgl.gif" align="absmiddle" border="0" height="16" width="16"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sampai Tanggal : <input type="text" name="ke" id="ke" size="12" maxlength="10" onFocus="this.setStyle({ background: 'yellow' });MaskedTextBox_NS_FocusMask(event, this.id, '99/99/9999');" onkeyup="date_entry_new(this,event);" onBlur="this.setStyle({ background: 'white' });" onkeypress="return date_input(this.id,this.name,event);" onChange="date_validation(this);"  /><a href="javascript:void(0)" onclick="gfPop.fPopCalendar($('ke'));return false;"><img name="popcal" src="login_files/tgl.gif" align="absmiddle" border="0" height="16" width="16"></a>				
			<br/><br/>
<button name="btreport" type="button" id="btreport" value="DownloadReport" onClick="window.open('lapsuratmasukarepot?dari='+$('dari').value+'&ke='+$('ke').value,'reportmasuk','left='+Math.ceil(screen.width/2-500)+',top='+Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');" >Download Report</button>
<button name="btreport" type="button" id="btreport" value="DownloadReport" onClick="window.open('lapsuratmasukaxl?dari='+$('dari').value+'&ke='+$('ke').value,'reportmasuk','left='+Math.ceil(screen.width/2-500)+',top='+Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');" >Download Excel Report</button>
				</center>
			</div><!-- #content -->
		</div><!-- #primary -->
	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
								<? echo $pembuat;?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<iframe name="gToday:normal:login_files/agenda.js" id="gToday:normal:login_files/agenda.js" src="ipopeng" style="visibility: visible; z-index: 999; position: absolute; left: -500px; top: 219px; width: 174px; height: 174px;" frameborder="0" height="189" scrolling="no" width="174"></iframe>
<script src="js/prototype.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
						var now    = new Date();
						var tgl=now.getDate();
						if (tgl/10<1)	tgl='0'+tgl;
						var bln=(now.getMonth()+1);
						if (bln/10<1)	bln='0'+bln;
						var thn=now.getFullYear();
						var jam=now.getHours();
						var hasil=tgl+"/"+bln+"/"+thn;
						$('ke').value=hasil;
						hasil="01/01/"+thn;
						$('dari').value=hasil;
</script>
</body></html>