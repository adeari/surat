<?
class suratkeluarlistmodel extends CI_Model {    
    function __construct()
    {
        parent::__construct();
    }
    function getTotalData()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(nosurat) as jumlah from keluar;";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function getTotalDatahariini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(nosurat) as jumlah from keluar where date(tanggal)=date(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function getTotalDatamingguini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(nosurat) as jumlah from keluar where week(tanggal)=week(now()) and year(tanggal)=year(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function getTotalDatabulanini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(nosurat) as jumlah from keluar where month(tanggal)=month(now()) and year(tanggal)=year(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    
    function getKondisiIsiData()
    {
        $balik=" where nosurat is not null ";
        $db=$this->db;
        if ((strcmp($this->input->post('pilihcari'),"nosurat")==0
	     ||strcmp($this->input->post('pilihcari'),"dari")==0
	     ||strcmp($this->input->post('pilihcari'),"tujuan")==0
	     ||strcmp($this->input->post('pilihcari'),"isi")==0
	     ||strcmp($this->input->post('pilihcari'),"keterangan")==0
	     ||strcmp($this->input->post('pilihcari'),"no_kendali")==0
	     ||strcmp($this->input->post('pilihcari'),"no_berkas")==0
	    )
	    &&strlen($this->input->post('textcari'))>0 )
            $balik.=" and ".$this->input->post('pilihcari')."=".$db->escape($this->input->post('textcari'))." ";
        
		  
        else if ((strcmp($this->input->post('pilihcari'),"tanggal")==0
		)
		 &&strlen($this->input->post('textcari'))>0 )
             $balik.=" and date(".$this->input->post('pilihcari').") = STR_TO_DATE('".$this->input->post('textcari')."','%d/%m/%Y') ";
        
        return $balik;
    }
    
    function cekData()
    {
	$balik=false;
	$db=$this->db;
	$limit="50";
        if ($this->input->post('pilihjmlhalaman'))
            $limit=$this->input->post('pilihjmlhalaman');
        $offset=$this->input->post('halaman');
        $limit=" limit ".$offset." , ".$limit;
	$qry="select nosurat as jumlah from keluar ".$this->getKondisiIsiData()." ".$limit.";";
	$hasil =$db->query($qry);
        if ($hasil->num_rows()>0)	$balik=true;
	return $balik;
    }
    
    function getIsidata()
    {
        $balik="";
        $db=$this->db;
        $limit="50";
        if ($this->input->post('pilihjmlhalaman'))
            $limit=$this->input->post('pilihjmlhalaman');
        $offset="0";
        if ($this->input->post('halaman'))
	{
	    if ($this->cekData())
		$offset=$this->input->post('halaman');
	}
        $limit=" limit ".$offset." , ".$limit;
        $ordernya=" no_urut asc";
        if ($this->input->post('ordernya'))
            $ordernya=" ".$this->input->post('ordernya');
        if ($this->input->post('ascnya'))
            $ordernya.=" ".$this->input->post('ascnya')." ";
        $qry="select no_urut,nosurat,DATE_FORMAT(tanggal, '%d/%m/%Y') as  tanggalv ,dari,tujuan,isi from keluar ".
	$this->getKondisiIsiData()." order by ".$ordernya." ".$limit.";";
        $hasil =$db->query($qry);
        $baris=0;
	$nomordata=(int)$offset;
        $ganti=true;
        foreach ($hasil->result() as $row)
        {
            $baris++;$nomordata++;
            if ($ganti) {
                $balik.="<tr class=\"alternate\" valign=\"top\">";
                $ganti=false;
            } else {
                $balik.="<tr class=\"author-self\" valign=\"top\">";
                $ganti=true;
            }
	    $balik.="<th scope=\"row\" class=\"check-column\"><input name=\"ck".$baris."\" id=\"ck".$baris."\" value=\"".$row->nosurat."\" type=\"checkbox\"></th>";
	    $balik.="<td>".$nomordata."</td>";
            $balik.="<td><a href=\"#\" class=\"row-title\" onClick=\"detail('".$row->nosurat."')\">".$row->nosurat."</a><div class=\"row-actions\">
            <span class=\"edit\"><a href=\"#\" onClick=\"detail('".$row->nosurat."')\">Detail</a> | <a href=\"#\" onClick=\"ubah('".$row->nosurat.
            "',$('ck".$baris."'));\">Ubah</a> |
             <a href=\"#\" onClick=\"hapus1('".$row->nosurat.
            "');\">Hapus</a></span></div></td>";
	    $balik.="<td>".$row->tanggalv."&nbsp;</td>";
	    $balik.="<td>".$row->dari."&nbsp;</td>";
	    $balik.="<td>".$row->tujuan."&nbsp;</td>";
	    $balik.="<td>".$row->isi."&nbsp;</td>";
	    $balik.="</tr>";
        }
        return $balik;
    }
    
    function getOptionCari()
    {
        $options = array(
                  'nosurat'  => 'No. Surat',
                  'dari'    => 'Bagian / SUBDIN',
                  'tujuan' => 'Tujuan',
                  'isi' => 'Perihal',
                  'keterangan' => 'Keterangan',
		  'no_kendali' => 'No. Kendali',
		  'no_berkas' => 'No. Berkas',
                  'tujuan' => 'Tujuan',
                  'tanggal' => 'Tanggal'
                );
        $pilih="nama";
        if ($this->input->post('pilihcari'))
            $pilih=$this->input->post('pilihcari');
        return form_dropdown('pilihcari', $options, $pilih);
    }
    
    function getOptionJmlHalaman()
    {
        $options = array(
                  '50'    => '50',
                  '100' => '100',
                  '300' => '300',
                  '500' => '500'
                );
        $pilih="50";
        if ($this->input->post('pilihjmlhalaman'))
            $pilih=$this->input->post('pilihjmlhalaman');
        $extranya=" id=\"pilihjmlhalaman\" onChange=\"pilihBarisHalaman()\" ";
        return form_dropdown('pilihjmlhalaman',$options, $pilih, $extranya);
    }
    
    function getTextCari()
    {
        $pilih="";
        if ($this->input->post('textcari'))
            $pilih=$this->input->post('textcari');
        $data = array(
              'name'        => 'textcari',
              'id'          => 'textcari',
              'value'       => $pilih,
              'size'        => '70'
            );

        return form_input($data);
    }
    function buttonCari()
    {
        $data = array(
            'name' => 'btcari',
            'id' => 'btcari',
            'value' => 'Cari',
            'type' => 'button',
            'content' => 'Cari',
            'onClick' => 'cari()'
        );

        return form_button($data);
    }
    function getHalamanSkr()
    {
        $balik="1";
        if ($this->input->post('halaman'))
        {
	    if ($this->cekData())
	    {
		$angka=((int)$this->input->post('halaman')/(int)$this->input->post('pilihjmlhalaman'))+1;
		$balik=$angka;
	    }
        }
        return $balik;
    }
    
    function getViewHalaman()
    {
        $baris=50;
        if ($this->input->post('pilihjmlhalaman'))
            $baris=(int)$this->input->post('pilihjmlhalaman');
        $config['base_url'] = 'suratkeluarlist?';
        $db=$this->db;
        $qry="select count(*) as jumlah from keluar ".$this->getKondisiIsiData().";";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $totalBaris=(int)$row->jumlah;
        $config['total_rows'] = $totalBaris;
        $config['per_page'] = $baris;
        $config['uri_segment'] = 3;
        $config['num_links'] = 10;
        $config['page_query_string'] = TRUE;
        $config['first_link'] = '<< Pertama';
        $config['last_link'] = 'Terakhir >>';
        $config['cur_page']='1';
        if ($this->input->post('halaman'))
	{
	    if ($this->cekData())
		$config['cur_page']=$this->input->post('halaman');
	}
        $config['cur_tag_open']='&nbsp;&nbsp;[&nbsp;<font color="#790000"><strong>';
        $config['cur_tag_close']='</strong></font>&nbsp;]&nbsp;&nbsp;';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    function hiddenpilihan()
    {
        $valuenya="0";
        if ($this->input->post('halaman'))
	{
	    if ($this->cekData())
		$valuenya=$this->input->post('halaman');
	}
        $balik=form_hidden('halaman', $valuenya);
        $valuenya="asc";
        if ($this->input->post('ascnya'))
            $valuenya=$this->input->post('ascnya');
        $balik.=form_hidden('ascnya', $valuenya);
        $valuenya="no_urut";
        if ($this->input->post('ordernya'))
            $valuenya=$this->input->post('ordernya');
        $balik.=form_hidden('ordernya', $valuenya);
        $balik.=form_hidden('pilihankita', "");
        $balik.=form_hidden('bthapus1', "");
        return $balik;
    }
    
    function buttonAtas()
    {
        $data = array(
            'name' => 'bthapus',
            'id' => 'bthapus',
            'value' => 'Hapus',
            'type' => 'button',
            'content' => 'Hapus',
            'onClick' => 'hapusklik()'
        );
        $data2 = array(
            'name' => 'btTambah',
            'id' => 'btTambah',
            'value' => 'Tambah',
            'type' => 'button',
            'content' => 'Tambah',
            'onClick' => 'tambahuserlist()'
        );
        $balik=form_button($data)."&nbsp;&nbsp;&nbsp;&nbsp;".form_button($data2);
        return $balik;
    }
    
    function hapusklik()
    {
        $db=$this->db;
	$qry1="";
        $qry=" delete from keluar ";
        $jmlData=(int)$this->input->post('pilihjmlhalaman');
        $kondisihapus="";
        $awal=true;
        for ($i=1;$i<=$jmlData;$i++)
        {
            if (strlen($this->input->post("ck".$i))>0)
            {
		$qry1="insert into tracking1 (tanggal,keterangan,nama_user) 
		values (now(),'Hapus Surat Keluar , No. Surat : ".$this->input->post("ck".$i)."','".$this->session->userdata('yangmasuk')."');";
		$db->query($qry1);
                if ($awal)
                {
                    $kondisihapus.=" where nosurat=".$db->escape($this->input->post("ck".$i))." ";
                    $awal=false;
                }
                else
                    $kondisihapus.=" or nosurat=".$db->escape($this->input->post("ck".$i))." ";
            }
        }
        
        $qry.=$kondisihapus;
        $db->query($qry);
	$qry="select namafile from suratkeluarextra ".$kondisihapus;
	$hasil =$db->query($qry);
	$direktoriuplod="gambaruplod/";
        foreach ($hasil->result() as $row)
        {
	    unlink($direktoriuplod.$row->namafile);
	}
	$qry=" delete from suratkeluarextra ".$kondisihapus;
	$db->query($qry);
    }
    
    function getExtensinya($str)
    {
	$balik="";
	if (strcmp(substr($str,(strlen($str)-4),4),"jpeg")==0)
	    $balik="jpg";
	else
	    $balik=substr($str,(strlen($str)-3),3);
	return $balik;
    }
    
    function convertTangal($str)
    {
	$balik="NULL";
	if (strlen($str)>0)
	    $balik="STR_TO_DATE('".$str."','%d/%m/%Y')";
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
    
    function tambah()
    {
	$db=$this->db;
	if (strcmp($this->input->post('bttambah1'),"tambah")==0)
	{
	    $qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Tambah Surat Keluar , No. Surat : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('txnosurat')))
	    ."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="insert into keluar (no_urut,nosurat,tanggal,dari,tujuan,keterangan,isi,no_berkas
	    ,no_kendali) values (423".
	    ",".$db->escape(str_replace(" ", "", $this->input->post('txnosurat'))).
	    ",".$this->convertTangal($this->input->post('txttanggal')).
	    ",".$db->escape($this->input->post('txdari')).
	    ",".$db->escape($this->input->post('txtujuan')).
	    ",".$db->escape($this->input->post('txketerangan')).
	    ",".$db->escape($this->input->post('txisi')).
	    ",".$db->escape($this->input->post('txno_berkas')).
	    ",".$db->escape($this->input->post('txno_kendali')).
	    ");";
	    
	} else if (strcmp($this->input->post('bttambah1'),"ubah")==0)
	{
	    $qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Edit Surat Keluar , No. Surat : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('txnosurat')))
	    ."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="update keluar set nosurat=".$db->escape(str_replace(" ", "", $this->input->post('txnosurat'))).
	    ",tanggal=".$this->convertTangal($this->input->post('txttanggal')).
	    ",dari=".$db->escape($this->input->post('txdari')).
	    ",tujuan=".$db->escape($this->input->post('txtujuan')).
	    ",keterangan=".$db->escape($this->input->post('txketerangan')).
	    ",isi=".$db->escape($this->input->post('txisi')).
	    ",no_berkas=".$db->escape($this->input->post('txno_berkas')).
	    ",no_kendali=".$db->escape($this->input->post('txno_kendali')).
	    " where nosurat=".$db->escape($this->input->post('pilihankita')).";";
	}
	$db->query($qry);
	//tuk upload file ini
	$direktoriuplod="gambaruplod/";
	if (strcmp($this->input->post('bttambah1'),"ubah")==0)
	{
	    $qry="update suratkeluarextra set nosurat=".$db->escape(str_replace(" ", "", $this->input->post('txnosurat')))
	    ." where nosurat=".$db->escape($this->input->post('pilihankita')).";";
	    $db->query($qry);
	}
	for ($i=1;$i<11;$i++)
	{
	    $nomorpostfile=$i;
	    $namapostfile="txgambar".$nomorpostfile;
	    if (strlen($_FILES[$namapostfile]['tmp_name'])>0)
	    {
		$namafileupload="gbrk".$nomorpostfile.$this->ambilnomernya($this->input->post('txnosurat')).
		$this->session->userdata('yangmasuk').".jpg";
		move_uploaded_file($_FILES[$namapostfile]['tmp_name'], $direktoriuplod.$namafileupload);
		$qry="select namafile from suratkeluarextra where urut=".$nomorpostfile." 
		and nosurat=".$db->escape(str_replace(" ", "", $this->input->post('txnosurat'))).";";
		$hasil =$db->query($qry);
		foreach ($hasil->result() as $row)
		{
		    unlink($direktoriuplod.$row->namafile);
		}
		$qry="delete from suratkeluarextra where urut=".$nomorpostfile." 
		and nosurat=".$db->escape(str_replace(" ", "", $this->input->post('txnosurat')))
		.";";
		$db->query($qry);
		$qry="insert into suratkeluarextra(nosurat,urut,namafile,ukuuran,tipe) 
		values (".$db->escape(str_replace(" ", "", $this->input->post('txnosurat')))
		.",".$nomorpostfile
		.",".$db->escape($namafileupload)
		.",".$db->escape($_FILES[$namapostfile]['size'])
		.",".$db->escape($_FILES[$namapostfile]['type'])
		.");";
		$db->query($qry);
	    }
	}
    }
    
    function hapus1()
    {
	$db=$this->db;
	$qry="delete from keluar where nosurat=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
	$qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Hapus Surat Keluar , No. Surat : ".$this->input->post('bthapus1')."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	$qry="select namafile from suratkeluarextra where nosurat=".$db->escape($this->input->post('bthapus1')).";";
	$hasil =$db->query($qry);
	$direktoriuplod="gambaruplod/";
        foreach ($hasil->result() as $row)
        {
	    unlink($direktoriuplod.$row->namafile);
	}
	$qry="delete from suratkeluarextra where nosurat=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
    }
}
?>