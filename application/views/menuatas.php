	<table class="wp-list-table posts" cellspacing="0" width="100%">
<tr class="alternate"><td>
<marquee behavior="scroll" direction="left"><?=$isipesan?></marquee>
</td></tr>	
</table>
	<header id="branding" role="banner">
			<nav id="access" role="navigation">
								<div class="menu">
								<ul><li class="current_page_item"><a href="<?=$lincss?>menuawal" title="File">File</a><ul class="children"><li class="item-1"><a href="<?=$lincss?>logout" title="Logout">Log Out</a></li></ul></li>
								<?=$master?><?=$transaksi?><?=$laporan?><?=$utility?><?=$menuhelp?>
								</div>
			</nav><!-- #access -->
	</header><!-- #branding -->
<table class="wp-list-table widefat posts" cellspacing="0">
<tr class="alternate" valign="top"><td width="70%"  align="right">Nama Pemakai <font color="red"><? echo $usname;?></font></td><td align="right" id="jamnya" width="30%"></td></tr>	
</table>	
<script language="JavaScript" type="text/javascript">
						function tulisjam(){
						var now    = new Date();
						var tgl=now.getDate();
						if (tgl/10<1)	tgl='0'+tgl;
						var bln=(now.getMonth()+1);
						if (bln/10<1)	bln='0'+bln;
						var thn=now.getFullYear();
						var jam=now.getHours();
						if (jam/10<1)	jam='0'+jam;
						var menit=now.getMinutes();
						if (menit/10<1)	menit='0'+menit;
						var detik=now.getSeconds();
						if (detik/10<1)	detik='0'+detik;
						var hasil=tgl+"/"+bln+"/"+thn+" "+jam+":"+menit+":"+detik;
						document.getElementById("jamnya").innerHTML=' Waktu '+hasil+'&nbsp;&nbsp;';
						}
						setInterval("tulisjam()",500);
						</script>