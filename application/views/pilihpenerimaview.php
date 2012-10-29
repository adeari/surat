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


<body style="background-color:#F9F9F9;" onbeforeunload="hilang()">
<form name="dataliat" id="dataliat" method="post" action="<?=$lincss;?>pilihpenerima">
	
			<div id="content" role="main">
<center><h1><font color="blue">Pilih penerima Surat</font></h1></center>
<table class="wp-list-table widefat posts" cellspacing="0">
	<thead>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column"><input type="checkbox" onClick="kliksemua(this)"></th>
		<th scope="col" id="title" class="manage-column column-title sortable desc" width="20%">
			<a href="#" onClick="orderBy('userid')" >User ID</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nama')" >Nama</a></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope="col" id="cb" class="manage-column column-cb check-column"><input type="checkbox" onClick="kliksemua(this)"></th>
		<th scope="col" id="title" class="manage-column column-title sortable desc" width="20%">
			<a href="#" onClick="orderBy('userid')" >User ID</a></th>
		<th scope="col" id="author" class="manage-column column-author sortable desc"><a href="#" onClick="orderBy('nama')" >Nama</a></th>
	</tr>
	</tfoot>
	<tbody id="the-list">
		<?=$isidata?>
	</tbody>

</table>
			</div><!-- #content -->
<script language="JavaScript" type="text/javascript">
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

function nambahin(isi,text,cknya)
{
	var lemen=  window.opener.document.getElementById("kirimke");
	var i=0;var ubah=true;
	if (cknya.checked)
	{
		if (lemen.length==1)
		if (lemen.options[0].value=='')
		{
			ubah=false;
			lemen.options[0]=new Option(text,isi);
		}
		if (ubah)
		{
			while (ubah&&i<lemen.length)	{
				if (lemen.options[i].value==isi)
					ubah=false;
				else 
					i++;
			}
		
		}
		if (ubah)
			lemen.options[lemen.length]=new Option(text,isi);
	} else {
		while (ubah&&i<lemen.length)	{
			if (lemen.options[i].value==isi)
			{
				ubah=false;
				lemen.options[i]=null;
			} else 
				i++;
		}
		if (lemen.length<1)
		lemen.options[0]=new Option('-- Pilih Penerima --','');
	}
}

function kliksemua(cknya){
	var i=0;
	var lemen=  window.opener.document.getElementById("kirimke");
	if (cknya.checked)
	{
		for (i=0;i<<?=$jumlah?>;i++)
		{
			lemen.options[i]=new Option($("ckh"+(i+1)).value,$("ck"+(i+1)).value);
		}
	}
	else
	{
		var banyak=lemen.length;
		for (i=0;i<banyak;i++) 
			lemen.options[0]=null;
		lemen.options[0]=new Option('-- Pilih Penerima --','');
	}
}
function hilang()
{
	window.opener.document.getElementById("<?=$okneh;?>").focus();
}
</script>



<script type="text/javascript" src="<?=$lincss;?>login_files/load-scripts.js"></script>
<?=$hiddenHalaman?>
<br/>
<center><button id="btclose" onclick="window.close()" value="DownloadReport" type="button" name="btclose">OK</button></center>
</form></body></html>