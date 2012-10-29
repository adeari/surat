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
</head>


<body class="home blog single-author two-column right-sidebar">
<form name="dataliat" id="dataliat" method="post" action="userlist">
	
<div id="page" class="hfeed">
<?=$menuatas?>
	<div id="main">
		<div id="primary">
			<div id="content" role="main">
<center><h1><font color="blue">Data Karyawan</font></h1></center>
<table class="wp-list-table widefat posts" cellspacing="0">
<thead>
<tr>
	<th colspan="2">&nbsp;</th>
</tr>
</thead>
<tr  class="author-self" valign="top">
	<td colspan="2"><div align="center">
		Cari berdasarkan &nbsp;&nbsp;&nbsp;<?=$optionCari?>&nbsp;&nbsp;&nbsp;<?=$textCari?>&nbsp;&nbsp;&nbsp;<?=$btCari?>
	</div></td>
</tr>
<tr  class="alternate" valign="top">
	<td>Tampilkan &nbsp;&nbsp;&nbsp;<?=$optionjmlHalaman?> &nbsp;&nbsp;&nbsp; baris, di halaman &nbsp;&nbsp;&nbsp;<?=$getHalamanskr?> </td>
	<td><div align="right"><?=$viewHalaman?></div></td>
</tr>
<tr class="author-self">
		<td colspan="2"><?=$bthapus?></th>
<tr>
</table>
<table class="wp-list-table widefat posts" cellspacing="0">
	<thead>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" width="3%"><input type="checkbox"></th>
		<th scope="col" id="title" class="manage-column column-title sortable desc" width="15%"><a href="#" onClick="orderBy('nip')" >N I P</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nama')" >Nama</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('userid')" >User ID</a></th>
		<th scope="col" id="categories" class="manage-column column-categories">Aktif</th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('telepon')" >Telepon</a></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column" width="3%"><input type="checkbox"></th>
		<th scope="col" id="title" class="manage-column column-title sortable desc" width="15%"><a href="#" onClick="orderBy('nip')" >N I P</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nama')" >Nama</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('userid')" >User ID</a></th>
		<th scope="col" id="categories" class="manage-column column-categories">Aktif</th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('telepon')" >Telepon</a></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
		<?=$isidata?>
	</tbody>

</table>
<table class="wp-list-table widefat posts" cellspacing="0">
<tr class="alternate" valign="top">
	<td colspan="2"><div align="right"><font color="red"><h3>Jumlah Karyawan = <?=$jumlahIsiData?></h3></font></div></td>
</tr>
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
function pilihBarisHalaman()
{
	$('dataliat').halaman.value='0';
	$('dataliat').submit();
}

function pilihHalaman(pil)
{
	$('dataliat').halaman.value=pil;
	$('dataliat').submit();
}
function orderBy(pil)
{
	if (pil==$('dataliat').ordernya.value)
	{
		if ($('dataliat').ascnya.value=='asc')
			$('dataliat').ascnya.value="desc";
		else
			$('dataliat').ascnya.value="asc";
	} else {
		$('dataliat').ordernya.value=pil;
		$('dataliat').ascnya.value="asc";
	}
	$('dataliat').submit();
}

function tambahuserlist()
{
	$('dataliat').action='isiuserlist';
	$('dataliat').submit();
}
function cari() {
	$('dataliat').halaman.value='0';
	$('dataliat').submit();
}

function detail(isi) {
	window.open ("userlistdetail?isi="+encodeURIComponent(isi),"mywindow","left="+Math.ceil(screen.width/2-120)+",top="+
		     Math.ceil(screen.height/2-110)+",menubar=1,scrollbars=1,resizable=1,width=350,height=390");
}
function ubah(isi)
{
	$('dataliat').pilihankita.value=isi;
	$('dataliat').action='isiuserlist';
	$('dataliat').submit();
}

function hapus1(isi)
{
	if (confirm("Karyawan dengan NIP "+isi+" dihapus ?"))
	{
		var url="isiuserlist";
		new Ajax.Request(url, {
			method: 'post',
			parameters: { 
			inihapus1:isi
			},
			onSuccess: function(transport) {
				$('dataliat').submit();
				alert(transport.responseText);
			}
		});
	}
	
}

function hapusklik()
{
	var jmlData=$F('pilihjmlhalaman'),i=1;
	if (jmlData><?=$jumlahIsiData?>)
		jmlData=<?=$jumlahIsiData?>;
	var ada=false;
	while (!ada&&i<=(jmlData-1))
	{
		if ($('ck'+i).checked)
			ada=true;
		else
			i++;
	}
	if (ada)
	{
		if (confirm("Data yang di Klik akan di Hapus?"))
		{
			$('dataliat').bthapus1.value=$F('bthapus');
			$('dataliat').submit();
		}
	} else	{
		alert('Click Data yang akan di Hapus');
	}
}

						</script>


<script type="text/javascript" src="login_files/load-scripts.js"></script>
<?=$hiddenHalaman?>
</form></body></html>