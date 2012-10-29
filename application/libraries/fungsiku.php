<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fungsiku {

    public function balik()
    {
		return "Dokumentasi Surat Dinas Pariwisata";
    }

    public function getPembuat()
    {
		return "Created By CV ......";
    }
    
    public function repotawal()
    {
	$balik="";
	$libnya="report/libraryuntukreportjava/";
	$balik="java  -cp  .;".$libnya."jasperreports-4.1.3.jar;".$libnya."commons-collections-3.2.1.jar;".$libnya."commons-logging-1.1.jar;".$libnya."commons-digester-1.7.jar;".$libnya."commons-beanutils-1.8.2.jar;".$libnya."groovy-all-1.7.5.jar;".$libnya."poi-3.7-20101029.jar;".$libnya."mysql-connector-java-5.1.6-bin.jar;".$libnya."poi-3.6.jar;".$libnya."iText-2.1.7.jar; Main ";
	return $balik;
    }
    

    public function getusname($a,$db)
    {
	$balik="";
	$qry="select nama from master_user where userid='".$a."'";
	$hasil =$db->query($qry);
	$row = $hasil->row();
	$balik=$row->nama;
	return $balik;
    }
    
    function IsiPEsan($pesannya,$useridnya,$db)
    {
	    if (strlen($pesannya)>0){
		$qry="delete from tb_pesan where userid=".$db->escape($useridnya);
		$db->query($qry);
		$qry="insert into tb_pesan (userid,pesan) values (".$db->escape($useridnya).",".
		$db->escape($pesannya).")";
		$db->query($qry);
	    }
    }
    
    function viewmenuatas($usname,$loadnya,$db,$lincss)
    {
	//ingat tambahkan ".$lincss." di setiap href
	$data['usname'] = $this->getusname($usname,$db);
	
	$warna=true;
	$qry="select b.nama,a.pesan from tb_pesan a inner join master_user b on a.userid=b.userid where b.aktif='Y'";
	$pesantez="";
	$hasil =$db->query($qry);
	foreach ($hasil->result() as $row)
        {
	    if ($warna)
	    {
		$warna=false;
		$pesantez.=" Dari ".$row->nama." : ".$row->pesan."&nbsp;&nbsp;&nbsp;";
	    } else {
		$warna=true;
		$pesantez.=" <font color=blue>Dari ".$row->nama." : ".$row->pesan."</font>&nbsp;&nbsp;&nbsp;";
	    }
	}
	if (strlen($pesantez)<1) $pesantez="Tidak ada Pesan";
	
	$qry="select master,transaksi,laporan,utility from master_user where userid='".$usname."'";
	$hasil =$db->query($qry);
	$row = $hasil->row();
	$isidata=$row->master;
	$master="";
	if (strcmp($isidata,'Y')==0)
	{
	$master="<li class=\"item-2\"><a title=\"master\">Master</a><ul class=\"children\"><li class=\"item-3\"><a href=\"".$lincss."userlist\" title=\"user\">User</a></li>".
		"<li class=\"item-4\"><a href=\"".$lincss."perusahaanisi\" title=\"perusahaan\">Perusahaan</a></li>
		<li class=\"item-42\"><a href=\"".$lincss."pesanisi\" title=\"Pesan\">Pesan</a></li>
		</ul></li>";
	}
	$isidata=$row->transaksi;
	$transaksi="";
	if (strcmp($isidata,'Y')==0)
	{
	    $transaksi.="<li class=\"item5\"><a title=\"programaplikasi\"><strong>Aplikasi</strong></a><ul class=\"children\">
								<li class=\"item6\"><a title=\"surat\">Surat</a><ul class=\"children\">
								<li class=\"item8\"><a href=\"".$lincss."suratmasuklista\">Surat Masuk</a></li>
								<li class=\"item7\"><a href=\"".$lincss."suratkeluarlista\">Surat Keluar</a></li>
								</ul></li>
								<li class=\"item9\"><a title=\"nota\">Nota</a><ul class=\"children\">
								<li class=\"item11\"><a href=\"".$lincss."notamasuklista\">Nota Masuk</a></li>
								<li class=\"item10\"><a href=\"".$lincss."notakeluarlista\">Nota Keluar</a></li>
								</ul></li>
								<li class=\"item12\"><a title=\"agenda\">Agenda</a><ul class=\"children\">
								<li class=\"item13\"><a href=\"".$lincss."agendasptlist\">Agenda SPT</a></li>
								<li class=\"item14\"><a href=\"".$lincss."agendasklist\">Agenda SK</a></li>
								</ul></li>
								</ul></li>";
	    /*
	$transaksi.="<li class=\"item5\"><a title=\"programaplikasi\"><font color=\"red\"><strong>Program Aplikasi</strong></font></a><ul class=\"children\">
								<li class=\"item6\"><a title=\"surat\">Surat</a><ul class=\"children\"><li class=\"item7\"><a href=\"".$lincss."suratmasuklist\">Surat Masuk</a></li><li class=\"item8\"><a href=\"".$lincss."suratkeluarlist\">Surat Keluar</a></li></ul></li>
								<li class=\"item9\"><a title=\"nota\">Nota</a><ul class=\"children\"><li class=\"item10\"><a href=\"".$lincss."notamasuklist\">Nota Masuk</a></li><li class=\"item11\"><a href=\"".$lincss."notakeluarlist\">Nota Keluar</a></li></ul></li>
								<li class=\"item12\"><a title=\"agenda\">Agenda</a><ul class=\"children\"><li class=\"item13\"><a href=\"".$lincss."agendasptlist\">Agenda SPT</a></li><li class=\"item14\"><a href=\"".$lincss."agendasklist\">Agenda SK</a></li></ul></li>
								</ul></li>";
	    */
	}
	$isidata=$row->laporan;
	$laporan="";
	if (strcmp($isidata,'Y')==0)
	{
	    $laporan.="<li class=\"item15\"><a title=\"laporan\">Laporan</a><ul class=\"children\">
	<li class=\"item16\"><a title=\"surat\">Surat</a><ul class=\"children\"><li class=\"item17\"><a href=\"".$lincss."lapsuratmasuka\">Surat Masuk</a></li><li class=\"item18\"><a href=\"".$lincss."lapsuratkeluara\">Surat Keluar</a></li></ul></li>
	<li class=\"item19\"><a title=\"nota\">Nota</a><ul class=\"children\"><li class=\"item20\"><a href=\"".$lincss."lapnotamasuka\">Nota Masuk</a></li><li class=\"item21\"><a href=\"".$lincss."lapnotakeluara\">Nota Keluar</a></li></ul></li>
	<li class=\"item22\"><a title=\"agenda\">Agenda</a><ul class=\"children\"><li class=\"item23\"><a href=\"".$lincss."lapagendaspt\">Agenda SPT</a></li><li class=\"item24\"><a href=\"".$lincss."lapagendask\">Agenda SK</a></li></ul></li>
	</ul></li>";
	/*
	$laporan.="<li class=\"item15\"><a title=\"laporan\"><font color=\"red\"><strong>Laporan</strong></font></a><ul class=\"children\">
	<li class=\"item16\"><a title=\"surat\">Surat</a><ul class=\"children\"><li class=\"item17\"><a href=\"".$lincss."lapsuratmasuk\">Surat Masuk</a></li><li class=\"item18\"><a href=\"".$lincss."lapsuratkeluar\">Surat Keluar</a></li></ul></li>
	<li class=\"item19\"><a title=\"nota\">Nota</a><ul class=\"children\"><li class=\"item20\"><a href=\"".$lincss."lapnotamasuk\">Nota Masuk</a></li><li class=\"item21\"><a href=\"".$lincss."lapnotakeluar\">Nota Keluar</a></li></ul></li>
	<li class=\"item22\"><a title=\"agenda\">Agenda</a><ul class=\"children\"><li class=\"item23\"><a href=\"".$lincss."lapagendaspt\">Agenda SPT</a></li><li class=\"item24\"><a href=\"".$lincss."lapagendask\">Agenda SK</a></li></ul></li>
	</ul></li>";*/
	}
	$isidata=$row->utility;
	$utility="";
	if (strcmp($isidata,'Y')==0)
	{
	$utility="<li class=\"item-25\"><a title=\"utility\">Utility</a><ul class=\"children\">
	<li class=\"item-26\"><a href=\"".$lincss."gentipasswordisi\">Ganti Password</a></li>
	<li class=\"item-26\"><a href=\"".$lincss."backup\">Backup</a></li>
	<li class=\"item-26\"><a href=\"".$lincss."restore\">Restore</a></li>
	</ul></li>";
	}
		
	$data['isipesan'] = $pesantez;
	$data['master'] = $master;
	$data['transaksi'] = $transaksi;
	$data['laporan'] = $laporan;
	$data['utility'] = $utility;
	$data['menuhelp'] = "<li class=\"item15\"><a href=\"".$lincss."helpdeh\">Help</a></li>";
	$data['lincss'] = $lincss;
	$balik = $loadnya->view('menuatas', $data, true);
	return $balik;
    }
}
?>