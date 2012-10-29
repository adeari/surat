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
<center><h1><font color="blue">Data Surat Masuk</font></h1></center>


<?=$menuisi?>


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
	var kunci=$F('txnosurat').gsub(' ', '');
	if (kunci.length<1) {
		alert('Nomor Surat tidak boleh KOSONG...');
	} else {
		var url="suratmasukisia";
		new Ajax.Request(url, {
			method: 'post',
			parameters: {
			cek: 'tambah',
			nosurat:kunci,
			no_kendali:$F('txno_kendali'),
			no_rak:$F('txno_rak'),
			no_baris:$F('txno_baris'),
			no_berkas:$F('txno_berkas')
			},
			onSuccess: function(transport) {
				if (transport.responseText=='y')
				{
					$('isiform').bttambah1.value='tambah';
					$('isiform').textcari.value=kunci;
					$('isiform').pilihcari.value='nosurat';
					$('isiform').halaman.value='0';
					masukkankelist();
					$('isiform').submit();
				} else if (transport.responseText=='Nomor Kendali sudah ada silahkan menambah atau mengubah Nomor kendali')
				{
					$('txno_kendali').focus();
					alert(transport.responseText);
				} else if (transport.responseText=='Nomor Berkas sudah ada silahkan menambah atau mengubah Nomor Berkas')
				{
					$('txno_berkas').focus();
					alert(transport.responseText);
				} else alert(transport.responseText);
			}
		});
		
	}
}

function ubah(){
	var kunci=$F('txnosurat').gsub(' ', '');
	if (kunci.length<1) {
		alert('Nomor Surat tidak boleh KOSONG...');
	} else {
		var url="suratmasukisia";
		new Ajax.Request(url, {
			method: 'post',
			parameters: {
			cek: 'ubah',
			nosurat:kunci,
			nosuratubah:$('isiform').pilihankita.value,
			no_kendali:$F('txno_kendali'),
			no_rak:$F('txno_rak'),
			no_baris:$F('txno_baris'),
			no_berkas:$F('txno_berkas')
			},
			onSuccess: function(transport) {
				if (transport.responseText=='y')
				{
					$('isiform').bttambah1.value='ubah';
					$('isiform').textcari.value=kunci;
					$('isiform').pilihcari.value='nosurat';
					$('isiform').action="suratmasuklista/doupload";
					masukkankelist();
					$('isiform').submit();
				} else if (transport.responseText=='Nomor Kendali sudah ada silahkan menambah atau mengubah Nomor kendali')
				{
					$('txno_kendali').focus();
					alert(transport.responseText);
				} else if (transport.responseText=='Nomor Berkas sudah ada silahkan menambah atau mengubah Nomor Berkas')
				{
					$('txno_berkas').focus();
					alert(transport.responseText);
				} else alert(transport.responseText);
			}
		});
		
	}
}

function batal() {
	$('isiform').submit();
}
function gantiGambar(srcgambar,elemenny)
{
	alert(srcgambar.getInputs() );
	elemenny.src=srcgambar.path+srcgambar.value;
}

function hapusgbr(str)
{
	if (confirm("Gambar "+str+" dihapus ?"))
	{
	var url="suratmasukisia";
		new Ajax.Request(url, {
			method: 'post',
			parameters: {
			cek: 'hapusgbr',
			nosurat:$F('txnosurat'),
			nomorgambar:str
			},
			onSuccess: function(transport) {
				$('ihik'+str).innerHTML="Terhapus";
			}
		});
	}
}

function checkGbr(str) {
  var ext = $F('txgambar'+str);
  ext = ext.substring(ext.length-3,ext.length);
  ext = ext.toLowerCase();
  if(ext != 'jpg' && ext != 'gif' && ext != 'png' && ext != 'bmp') {
	alert('Pilih file Gambar yang berextensi jpg,png,gif,bmp');
    return false; 
  } else {
    return true;
  }
}

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
function pilihuser()
{
	window.open ("<?=$lincss;?>pilihpenerima?ii=suratmasuk&uiu="+$('isiform').pilihankita.value,"mywindow","left="+Math.ceil(screen.width/2-133)+",top="+
		     Math.ceil(screen.height/2-250)+",scrollbars=1,menubar=1,resizable=1,width=450,height=500");
}
function masukkankelist()
{
	var vari='';
	for (var i=0;i<$('kirimke').length;i++)
	{
		if (vari.length<1)
			vari=$('kirimke').options[i].value;
		else
			vari+=";"+$('kirimke').options[i].value;
	}
	$('isiform').kirimkelist.value=vari;
}
</script>
<iframe name="gToday:normal:login_files/agenda.js" id="gToday:normal:login_files/agenda.js" src="ipopeng" style="visibility: visible; z-index: 999; position: absolute; left: -500px; top: 219px; width: 174px; height: 174px;" frameborder="0" height="189" scrolling="no" width="174"></iframe>
</body></html>