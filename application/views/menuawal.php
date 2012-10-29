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
<link rel="stylesheet" type="text/css" href="login_files/csspilihanini.css">
<link rel="stylesheet" type="text/css" media="all" href="login_files/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<script src="js/prototype.js" type="text/javascript"></script>
<![endif]-->
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>

<body class="home blog single-author two-column right-sidebar">
<div id="page" class="hfeed">
<?=$menuatas?>
	<div id="main">
		<div id="primary">
			<div id="content" role="main">
	
<div id="main_pane_left"><div class="groupindu"><h2>Surat</h2>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="suratmasuklista">Surat Masuk <?=$suratmasuk?></a>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="suratkeluarlista">Surat Keluar <?=$suratkeluar?></a>
</div></div>
<div id="main_pane_left">
<div class="groupindu"><h2>Nota</h2>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="notamasuklista">Nota Masuk <?=$notamasuk?></a>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="notakeluarlista">Nota Keluar <?=$notakeluar?></a>
</div></div>
<div id="main_pane_left">
<div class="groupindu"><h2>Agenda</h2>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="agendasptlist">Agenda SPT <?=$agendaspt?></a>
<br/>&nbsp;&nbsp;&nbsp;Jumlah <a href="agendasklist">Agenda SK <?=$agendask?></a>
</div></div>
			</div><!-- #content -->
		</div><!-- #primary -->
	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
								<? echo $pembuat;?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
</body></html>