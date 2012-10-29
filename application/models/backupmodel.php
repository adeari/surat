<?
class backupmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function convertTangal($str)
    {
	$balik="NULL";
	if (strlen($str)>0)
	    $balik="STR_TO_DATE('".$str."','%d/%m/%Y')";
	return $balik;
    }
    
    function convertJam($str)
    {
	$balik="NULL";
	if (strlen($str)>0)
	    $balik="STR_TO_DATE('".$str."','%d/%m/%Y %T')";
	return $balik;
    }
    
    function angka($str)
    {
	$balik="NULL";
	if (strlen($str)>0)
	    $balik=$str;
	return $balik;
    }
    function ambilnomernya($nomer)
    {
	$balik="";
	$nilai="asdfghjklqwertyuiopmnbvcxz1234567890";
	$nomer=strtolower($nomer);
	$pjg=strlen($nomer);
	for ($i=0;$i<$pjg;$i++)
	{
	    $semen=substr($nomer,$i,1);
	    $pos = strpos($nilai, $semen);
	    if (strlen($pos)>0)	$balik.=$semen;
	}
	return $balik.date("YmdsiH");
    }
    
    
    function isigambarduluagendaspt($noagendae)
    {
	$db=$this->db;
	
	$direktoriupload="gambaruplod/";
	
	$qry="select count(*) as jumlah from agendasptextra where urut=1 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasalaspt1".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from agendaspt where noagenda=".$db->escape($noagendae)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendasptextra where urut=1 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendasptextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from agendasptextra where urut=2 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasalaspt2".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from agendaspt where noagenda=".$db->escape($noagendae)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendasptextra where urut=2 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendasptextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from agendasptextra where urut=3 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasalaspt3".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from agendaspt where noagenda=".$db->escape($noagendae)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendasptextra where urut=3 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendasptextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }
    
    function isigambarduluagendask($noagendae)
    {
	$db=$this->db;
	
	$direktoriupload="gambaruplod/";
	
	$qry="select count(*) as jumlah from agendaskextra where urut=1 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasalask1".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from agendask where noagenda=".$db->escape($noagendae)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendaskextra where urut=1 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendaskextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from agendaskextra where urut=2 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasalask2".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from agendask where noagenda=".$db->escape($noagendae)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendaskextra where urut=2 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendaskextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from agendaskextra where urut=3 and noagenda=".$db->escape($noagendae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasalask3".$this->ambilnomernya($noagendae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from agendask where noagenda=".$db->escape($noagendae)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from agendaskextra where urut=3 and noagenda=".$db->escape($noagendae).";";
			$db->query($qry);
			$qry="insert into agendaskextra(noagenda,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($noagendae)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }
    
    function isigambardulumasuk($nosurate)
    {
	$db=$this->db;
	
	$direktoriupload="gambaruplod/";
	
	$qry="select count(*) as jumlah from suratextra where urut=1 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasal1".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from masuk where nosurat=".$db->escape($nosurate)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratextra where urut=1 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from suratextra where urut=2 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal2".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from masuk where nosurat=".$db->escape($nosurate)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratextra where urut=2 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from suratextra where urut=3 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal3".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from masuk where nosurat=".$db->escape($nosurate)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratextra where urut=3 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }
        
    function isigambardulukeluar($nosurate)
    {
	$db=$this->db;
	
	$direktoriupload="gambaruplod/";
	
	$qry="select count(*) as jumlah from suratkeluarextra where urut=1 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasal1sk".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from keluar where nosurat=".$db->escape($nosurate)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratkeluarextra where urut=1 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratkeluarextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from suratkeluarextra where urut=2 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal2sk".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from keluar where nosurat=".$db->escape($nosurate)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratkeluarextra where urut=2 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratkeluarextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from suratkeluarextra where urut=3 and nosurat=".$db->escape($nosurate).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal3sk".$this->ambilnomernya($nosurate).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from keluar where nosurat=".$db->escape($nosurate)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from suratkeluarextra where urut=3 and nosurat=".$db->escape($nosurate).";";
			$db->query($qry);
			$qry="insert into suratkeluarextra(nosurat,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nosurate)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }
    
    function isigambardulunota_masuk($nonotae)
    {
	$db=$this->db;
	
	$direktoriupload="gambaruplod/";
	
	$qry="select count(*) as jumlah from notamasukextra where urut=1 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasal1nm".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from nota_masuk where nonota=".$db->escape($nonotae)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notamasukextra where urut=1 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notamasukextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from notamasukextra where urut=2 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal2nm".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from nota_masuk where nonota=".$db->escape($nonotae)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notamasukextra where urut=2 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notamasukextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from notamasukextra where urut=3 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal3nm".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from nota_masuk where nonota=".$db->escape($nonotae)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notamasukextra where urut=3 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notamasukextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }	
    
    function isigambardulunota_keluar($nonotae)
    {
	$db=$this->db;
	$direktoriupload="gambaruplod/";
	$qry="select count(*) as jumlah from notakeluarextra where urut=1 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0)
	{
	    $namafileupload="gbrasal1nk".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar from nota_keluar where nonota=".$db->escape($nonotae)." and gambar is not null and length(gambar)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notakeluarextra where urut=1 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notakeluarextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",1"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from notakeluarextra where urut=2 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal2nk".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar2 from nota_keluar where nonota=".$db->escape($nonotae)." and gambar2 is not null and length(gambar2)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar2;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notakeluarextra where urut=2 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notakeluarextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",2"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
	
	$qry="select count(*) as jumlah from notakeluarextra where urut=3 and nonota=".$db->escape($nonotae).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ($row->jumlah==0){
	    $namafileupload="gbrasal3nk".$this->ambilnomernya($nonotae).$this->session->userdata('yangmasuk').".jpg";
	    if (!is_file($direktoriupload.$namafileupload))
	    {
		$qry="select gambar3 from nota_keluar where nonota=".$db->escape($nonotae)." and gambar3 is not null and length(gambar3)>0;";
		$hasil =$db->query($qry);
		if ($hasil->num_rows()>0)
		{
		    $row=$hasil->row();
		    $gambar=$row->gambar3;
			$handle = fopen($direktoriupload.$namafileupload, "wb");
			fwrite($handle, $gambar);
			fclose($handle);
			$qry="delete from notakeluarextra where urut=3 and nonota=".$db->escape($nonotae).";";
			$db->query($qry);
			$qry="insert into notakeluarextra(nonota,urut,namafile,ukuuran,tipe) 
			    values (".$db->escape($nonotae)
			    .",3"
			    .",".$db->escape($namafileupload)
			    .",123"
			    .",'jpg'"
			    .");";
			$db->query($qry);
		}
	    }
	}
    }	
    
    
    
    
    function backupini()
    {
	$db=$this->db;
	$tampil="";
	exec("rmdir /s/q bakup");
	if (!is_dir("bakup"))
	    mkdir("bakup");
	$inilahtempat="backupdari".str_replace("/", "_", $this->input->post('dari'))."sampai".str_replace("/", "_", $this->input->post('ke'));
	$direktorinya="bakup/".$inilahtempat;
	if (!is_dir($direktorinya))
	    mkdir($direktorinya);
	
	$direktoribakup=$direktorinya."/";
	$direktoriupload="gambaruplod/";
	$filename=$direktorinya."/isidata.sql";
	if (!$fp = fopen($filename, 'a')) {
         echo "Cannot open file ($fp)";
         exit;
	}
	
	
	//bagian agendask
	$qry="select noagenda, DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal,tujuan,isi,keterangan,dari,no_kendali,
	no_berkas,no_urut 
	from agendask where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
        foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from agendask where noagenda=".$db->escape($row->noagenda).";\n";
	    fwrite($fp, $isi);
	    $isi = "insert into agendask values(".$db->escape($row->noagenda)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->tujuan)
	    .",".$db->escape($row->isi)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",".$db->escape($row->dari)
	    .",".$db->escape($row->no_kendali)
	    .",".$db->escape($row->no_berkas)
	    .",".$this->angka($row->no_urut)
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambarduluagendask($row->noagenda);
	    
	    $qry="select urut,namafile,ukuuran,tipe from agendaskextra where noagenda=".$db->escape($row->noagenda).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from agendaskextra where noagenda=".$db->escape($row->noagenda)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into agendaskextra values (".$db->escape($row->noagenda)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan agendask
	    $qry="select no_rak,no_baris from agendask_dari  where noagenda=".$db->escape($row->noagenda).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from agendask_dari where noagenda=".$db->escape($row->noagenda).";\n";
		fwrite($fp, $isi);
		$isi = "insert into agendask_dari values (".$db->escape($row->noagenda)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    //______________tambahan agendask
	    
	}
	//____________________bagian agendask
	
	
	
	//bagian agendaspt
	$qry="select noagenda, DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal,tujuan,isi,keterangan,dari,no_kendali,
	no_berkas,no_urut  
	from agendaspt where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
        foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from agendaspt where noagenda=".$db->escape($row->noagenda).";\n";
	    fwrite($fp, $isi);
	    $isi = "insert into agendaspt values(".$db->escape($row->noagenda)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->tujuan)
	    .",".$db->escape($row->isi)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",".$db->escape($row->dari)
	    .",".$db->escape($row->no_kendali)
	    .",".$db->escape($row->no_berkas)
	    .",".$this->angka($row->no_urut)
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambarduluagendaspt($row->noagenda);
	    
	    $qry="select urut,namafile,ukuuran,tipe from agendasptextra where noagenda=".$db->escape($row->noagenda).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from agendasptextra where noagenda=".$db->escape($row->noagenda)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into agendasptextra values (".$db->escape($row->noagenda)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan agendaspt
	    $qry="select no_rak,no_baris from agendaspt_dari  where noagenda=".$db->escape($row->noagenda).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from agendaspt_dari where noagenda=".$db->escape($row->noagenda).";\n";
		fwrite($fp, $isi);
		$isi = "insert into agendaspt_dari values (".$db->escape($row->noagenda)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    //______________tambahan agendaspt
	}
	//___________bagian agendaspt
	
	
	//bagian suratmasuk
	$qry="select nosurat,DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal, dari, tujuan, isi, keterangan, disposisi,
	DATE_FORMAT(tgl_disposisi, '%d/%m/%Y') as tgl_disposisi, DATE_FORMAT(tgl_masuk, '%d/%m/%Y') as tgl_masuk,
	no_kendali, tindak_lanjut, no_urut, no_berkas, sifat_surat 
	from masuk where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
	foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from masuk where nosurat=".$db->escape($row->nosurat).";\n";
	    fwrite($fp, $isi);
	    $isi="insert into masuk values (".$db->escape($row->nosurat)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->dari)
	    .",".$db->escape($row->tujuan)
	    .",".$db->escape($row->isi)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",".$db->escape($row->disposisi)
	    .",".$this->convertTangal($row->tgl_disposisi)
	    .",".$this->convertTangal($row->tgl_masuk)
	    .",".$db->escape($row->no_kendali)
	    .",".$db->escape($row->tindak_lanjut)
	    .",".$this->angka($row->no_urut)
	    .",".$db->escape($row->no_berkas)
	    .",".$db->escape($row->sifat_surat)
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambardulumasuk($row->nosurat);
	    
	    $qry="select urut,namafile,ukuuran,tipe from suratextra where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from suratextra where nosurat=".$db->escape($row->nosurat)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into suratextra values (".$db->escape($row->nosurat)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan surat masuk
	    $qry="select userid,no_rak,no_baris from masuk_dari where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from masuk_dari where nosurat=".$db->escape($row->nosurat).";\n";
		fwrite($fp, $isi);
		$isi = "insert into masuk_dari values (".$db->escape($row->nosurat)
		.",".$db->escape($row2->userid)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select userid from masuk_ke where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from masuk_ke where nosurat=".$db->escape($row->nosurat)
		." and userid=".$db->escape($row2->userid).";\n";
		fwrite($fp, $isi);
		$isi = "insert into masuk_ke values (".$db->escape($row->nosurat)
		.",".$db->escape($row2->userid)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select nourut,userid,komentar,DATE_FORMAT(jam, '%d/%m/%Y %T') as jam  from masuk_komentar where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from masuk_komentar where nosurat=".$db->escape($row->nosurat)
		." and nourut=".$row2->nourut.";\n";
		fwrite($fp, $isi);
		$isi = "insert into masuk_komentar values (".$db->escape($row->nosurat)
		.",".$this->angka($row2->nourut)
		.",".$db->escape($row2->userid)
		.",".$db->escape($row2->komentar)
		.",".$this->convertJam($row2->jam)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    //______________tambahan surat masuk
	    
	}
	//___________________bagian surat masuk
	
	
	//bagian surat keluar
	$qry="select nosurat,DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal, tujuan, isi, keterangan, dari,no_kendali,no_berkas, no_urut 
	from keluar where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
	foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from keluar where nosurat=".$db->escape($row->nosurat).";\n";
	    fwrite($fp, $isi);
	    $isi="insert into keluar values (".$db->escape($row->nosurat)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->tujuan)
	    .",".$db->escape($row->isi)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",".$db->escape($row->dari)
	    .",".$db->escape($row->no_kendali)
	    .",".$db->escape($row->no_berkas)
	    .",".$this->angka($row->no_urut)
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambardulukeluar($row->nosurat);
	    
	    $qry="select urut,namafile,ukuuran,tipe from suratkeluarextra where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from suratkeluarextra where nosurat=".$db->escape($row->nosurat)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into suratkeluarextra values (".$db->escape($row->nosurat)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan surat keluar
	    $qry="select userid,no_rak,no_baris from keluar_dari where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from keluar_dari where nosurat=".$db->escape($row->nosurat).";\n";
		fwrite($fp, $isi);
		$isi = "insert into keluar_dari values (".$db->escape($row->nosurat)
		.",".$db->escape($row2->userid)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select userid from keluar_ke where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from keluar_ke where nosurat=".$db->escape($row->nosurat)
		." and userid=".$db->escape($row2->userid).";\n";
		fwrite($fp, $isi);
		$isi = "insert into keluar_ke values (".$db->escape($row->nosurat)
		.",".$db->escape($row2->userid)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select nourut,userid,komentar,DATE_FORMAT(jam, '%d/%m/%Y %T') as jam  from keluar_komentar where nosurat=".$db->escape($row->nosurat).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from keluar_komentar where nosurat=".$db->escape($row->nosurat)
		." and nourut=".$row2->nourut.";\n";
		fwrite($fp, $isi);
		$isi = "insert into keluar_komentar values (".$db->escape($row->nosurat)
		.",".$this->angka($row2->nourut)
		.",".$db->escape($row2->userid)
		.",".$db->escape($row2->komentar)
		.",".$this->convertJam($row2->jam)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    //______________tambahan surat keluar
	}
	
	//____________________________bagian surat keluar
	
	
	//bagian nota masuk
	$qry="select no_urut,nonota,DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal,perihal,sifat,
	dari,DATE_FORMAT(tgl_masuk, '%d/%m/%Y') as tgl_masuk, tujuan, DATE_FORMAT(tgl_disposisi, '%d/%m/%Y') as tgl_disposisi,
	isi, tindak_lanjut, keterangan 
	from nota_masuk where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
	foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from nota_masuk where nonota=".$db->escape($row->nonota).";\n";
	    fwrite($fp, $isi);
	    $isi="insert into nota_masuk values (".$this->angka($row->no_urut)
	    .",".$db->escape($row->nonota)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->perihal)
	    .",".$db->escape($row->sifat)
	    .",".$db->escape($row->dari)
	    .",".$this->convertTangal($row->tgl_masuk)
	    .",".$db->escape($row->tujuan)
	    .",".$this->convertTangal($row->tgl_disposisi)
	    .",".$db->escape($row->isi)
	    .",".$db->escape($row->tindak_lanjut)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambardulunota_masuk($row->nonota);
	    
	    $qry="select urut,namafile,ukuuran,tipe from notamasukextra where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from notamasukextra where nonota=".$db->escape($row->nonota)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into notamasukextra values (".$db->escape($row->nonota)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan surat nota masuk
	    $qry="select userid,no_rak,no_baris from nota_masuk_dari where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_masuk_dari where nonota=".$db->escape($row->nonota).";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_masuk_dari values (".$db->escape($row->nonota)
		.",".$db->escape($row2->userid)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select userid from nota_masuk_ke where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_masuk_ke where nonota=".$db->escape($row->nonota)
		." and userid=".$db->escape($row2->userid).";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_masuk_ke values (".$db->escape($row->nonota)
		.",".$db->escape($row2->userid)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select nourut,userid,komentar,DATE_FORMAT(jam, '%d/%m/%Y %T') as jam  from nota_masuk_komentar where
	    nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_masuk_komentar where nonota=".$db->escape($row->nonota)
		." and nourut=".$row2->nourut.";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_masuk_komentar values (".$db->escape($row->nonota)
		.",".$this->angka($row2->nourut)
		.",".$db->escape($row2->userid)
		.",".$db->escape($row2->komentar)
		.",".$this->convertJam($row2->jam)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    //______________tambahan nota masuk
	}
	//___________________________bagian nota masuk
	
	
	//bagian nota keluar
	$qry="select no_urut,nonota,DATE_FORMAT(tanggal, '%d/%m/%Y') as tanggal,perihal,sifat,
	tujuan, DATE_FORMAT(tgl_pengiriman, '%d/%m/%Y') as tgl_pengiriman,keterangan 
	from nota_keluar where date(tanggal) between ".
	$this->convertTangal($this->input->post('dari'))." and ".
	$this->convertTangal($this->input->post('ke'));
	$hasil =$db->query($qry);
	foreach ($hasil->result() as $row)
	{
	    if (strlen($tampil)<1)	$tampil="y";
	    $isi = "select count(*) as jumlah from nota_keluar where nonota=".$db->escape($row->nonota).";\n";
	    fwrite($fp, $isi);
	    $isi="insert into nota_keluar values (".$this->angka($row->no_urut)
	    .",".$db->escape($row->nonota)
	    .",".$this->convertTangal($row->tanggal)
	    .",".$db->escape($row->perihal)
	    .",".$db->escape($row->sifat)
	    .",".$db->escape($row->tujuan)
	    .",".$this->convertTangal($row->tgl_pengiriman)
	    .",".$db->escape($row->keterangan)
	    .",NULL"
	    .",NULL"
	    .",NULL"
	    .");\n";
	    fwrite($fp, $isi);
	    $this->isigambardulunota_keluar($row->nonota);
	    
	    $qry="select urut,namafile,ukuuran,tipe from notakeluarextra where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from notakeluarextra where nonota=".$db->escape($row->nonota)
		." and urut=".$this->angka($row2->urut).";\n";
		fwrite($fp, $isi);
		$isi = "insert into notakeluarextra values (".$db->escape($row->nonota)
		.",".$this->angka($row2->urut)
		.",".$db->escape($row2->namafile)
		.",".$this->angka($row2->ukuuran)
		.",".$db->escape($row2->tipe)
		.");\n";
		fwrite($fp, $isi);
		$filebakup=$direktoribakup.$row2->namafile;
		$fileupload=$direktoriupload.$row2->namafile;
		if (is_file( $fileupload ))
		{
		    copy($fileupload, $filebakup);
		}
	    }
	    
	    //tambahan surat nota keluar
	    $qry="select userid,no_rak,no_baris from nota_keluar_dari where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_keluar_dari where nonota=".$db->escape($row->nonota).";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_keluar_dari values (".$db->escape($row->nonota)
		.",".$db->escape($row2->userid)
		.",".$this->angka($row2->no_rak)
		.",".$this->angka($row2->no_baris)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select userid from nota_keluar_ke where nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_keluar_ke where nonota=".$db->escape($row->nonota)
		." and userid=".$db->escape($row2->userid).";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_keluar_ke values (".$db->escape($row->nonota)
		.",".$db->escape($row2->userid)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    $qry="select nourut,userid,komentar,DATE_FORMAT(jam, '%d/%m/%Y %T') as jam  from nota_keluar_komentar where
	    nonota=".$db->escape($row->nonota).";";
	    $hasil2 =$db->query($qry);
	    foreach ($hasil2->result() as $row2)
	    {
		$isi = "select count(*) as jumlah from nota_keluar_komentar where nonota=".$db->escape($row->nonota)
		." and nourut=".$row2->nourut.";\n";
		fwrite($fp, $isi);
		$isi = "insert into nota_keluar_komentar values (".$db->escape($row->nonota)
		.",".$this->angka($row2->nourut)
		.",".$db->escape($row2->userid)
		.",".$db->escape($row2->komentar)
		.",".$this->convertJam($row2->jam)
		.");\n";
		fwrite($fp, $isi);
	    }
	    
	    //______________tambahan nota keluar
	}
	
	//___________________________bagian nota keluar
	
	
	
	fclose($fp);
	if (strlen($tampil)<1)	$tampil="Data Kosong";
	echo $tampil;
	
	
    }
}
?>