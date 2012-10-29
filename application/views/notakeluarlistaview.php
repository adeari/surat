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
<link rel="stylesheet" href="<?=$lincss;?>login_files/load-styles.css" type="text/css" media="all">
<link rel="stylesheet" id="colors-css" href="<?=$lincss;?>login_files/colors-fresh.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" media="all" href="<?=$lincss;?>login_files/style.css">
<!--[if lt IE 9]>
<script src="<?=$lincss;?>js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='<?=$lincss;?>login_files/ie.css?ver=20110711' type='text/css' media='all' />
<![endif]-->
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<script type="text/javascript" src="<?=$lincss;?>login_files/l10n.js"></script>
<script type="text/javascript" src="<?=$lincss;?>login_files/load-scripts_002.js"></script>
<script type="text/javascript" src="<?=$lincss;?>js/prototype.js"></script>
</head>


<body class="home blog single-author two-column right-sidebar">
<form name="dataliat" id="dataliat" method="post" action="<?=$lincss;?>notakeluarlista">
	
<div id="page" class="hfeed">
<?=$menuatas?>
	<div id="main">
		<div id="primary">
			<div id="content" role="main">
<center><h1><font color="blue">Nota Keluar</font></h1></center>
<table class="wp-list-table widefat posts" cellspacing="0">
<thead>
<tr>
	<th colspan="2">&nbsp;</th>
</tr>
</thead>
<?=$kesalahan?>
<tr  class="author-self" valign="top">
	<td colspan="2"><div align="center">
		Cari berdasarkan &nbsp;&nbsp;&nbsp;<?=$optionCari?>&nbsp;&nbsp;&nbsp;<?=$textCari?>&nbsp;&nbsp;&nbsp;<?=$btCari?>
	</div></td>
</tr>
<tr  class="alternate" valign="top">
	<td>Tampilkan &nbsp;&nbsp;&nbsp;<?=$optionjmlHalaman?> &nbsp;&nbsp;&nbsp; baris, di halaman &nbsp;&nbsp;&nbsp;<?=$getHalamanskr?> </td>
	<td><div align="right"><?=$viewHalaman?></div></td>
</tr>
<?=$bthapus?>
</table>
<table class="wp-list-table widefat posts" cellspacing="0">
	<thead>
	<tr>
		<?=$cekboxini?>
		<th scope="col" id="title" class="manage-column column-title sortable desc"><a href="#" onClick="orderBy('no_urut')" >No.</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nonota')" >No.&nbsp;Nota</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('no_rak')" style="text-align:center">No.&nbsp;Rak</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('no_baris')" style="text-align:center">No.&nbsp;Baris</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('tanggal')" >Tanggal</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('tujuan')" >Tujuan</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('perihal')" >Perihal</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('keterangan')" >Keterangan</a></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<?=$cekboxini?>
		<th scope="col" id="title" class="manage-column column-title sortable desc"><a href="#" onClick="orderBy('no_urut')" >No.</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nonota')" >No.&nbsp;Nota</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('no_rak')" style="text-align:center">No.&nbsp;Rak</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('no_baris')" style="text-align:center">No.&nbsp;Baris</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('tanggal')" >Tanggal</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('tujuan')" >Tujuan</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('perihal')" >Perihal</a></th>
		<th scope="col" id="tags" class="manage-column column-tags"><a href="#" onClick="orderBy('keterangan')" >Keterangan</a></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
		<?=$isidata?>
	</tbody>

</table>
<table class="wp-list-table widefat posts" cellspacing="0" border="0">
<tr class="alternate" valign="top">
	<td rowspan="4"><div align="right"><font color="red" width="95%"><h3>Jumlah Nota Keluar</h3></font></div></td>
	<td><div align="right"><font color="red" width="3%"><h3>Hari ini</h3></font></div></td>
	<td><div align="right"><font color="red" width="2%"><h3><?=$jumlahIsiDataharini?></h3></font></div></td>
</tr>
<tr class="author-self" valign="top">
	<td><div align="right"><font color="red"><h3>Minggu ini</h3></font></div></td>
	<td><div align="right"><font color="red"><h3><?=$jumlahIsiDatamingguini?></h3></font></div></td>
</tr>
<tr class="alternate" valign="top">
	<td><div align="right"><font color="red"><h3>Bulan ini</h3></font></div></td>
	<td><div align="right"><font color="red"><h3><?=$jumlahIsiDatabulanini?></h3></font></div></td>
</tr>
<tr class="author-self" valign="top">
	<td><div align="right"><font color="red"><h3>Total</h3></font></div></td>
	<td><div align="right"><font color="red"><h3><?=$jumlahIsiData?></h3></font></div></td>
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
	$('dataliat').action='<?=$lincss;?>notakeluarisia';
	$('dataliat').submit();
}
function cari() {
	$('dataliat').halaman.value='0';
	$('dataliat').submit();
}

function detail(isi) {
	window.open ("<?=$lincss;?>notakeluardetaila?isi="+encodeURIComponent(isi),"mywindow","left="+Math.ceil(screen.width/2-500)+",top="+
		     Math.ceil(screen.height/2-300)+",scrollbars=1,menubar=1,resizable=1,width=1000,height=600");
}
function ubah(isi)
{
	$('dataliat').pilihankita.value=isi;
	$('dataliat').action='<?=$lincss;?>notakeluarisia';
	$('dataliat').submit();
}

function hapus1(isi)
{
	if (confirm("Surat dengan Nomor "+isi+" dihapus ?"))
	{
		$('dataliat').bthapus1.value=isi;
		$('dataliat').submit();
	}
	
}

function hapusklik()
{
	var jmlData=$F('pilihjmlhalaman'),i=1;
	if (jmlData><?=$jumlahIsiData?>)
		jmlData=<?=$jumlahIsiData?>;
	var ada=false;
	while (!ada&&i<=jmlData)
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

function komentar(isi) {
	window.open ("<?=$lincss;?>komentarnotakeluara?isi="+encodeURIComponent(isi),"komen","left="+Math.ceil(screen.width/2-500)+",top="+
		     Math.ceil(screen.height/2-300)+",scrollbars=1,menubar=1,resizable=1,width=1000,height=600");
}

						</script>


<script type="text/javascript" src="<?=$lincss;?>login_files/load-scripts.js"></script>
<?=$hiddenHalaman?>
</form></body></html>