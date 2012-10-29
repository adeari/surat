<?
class notakeluarlistamodel extends CI_Model {    
    function __construct()
    {
        parent::__construct();
    }
    
    function isAdmin() {
	$balik=false;
        $db=$this->db;
	$qry="select count(*) as jumlah from master_user a inner join tb_user b on a.userid=b.userid where
	a.userid=".$db->escape($this->session->userdata('yangmasuk'))." and b.hak_akses=1";
	$hasil =$db->query($qry);
        $row=$hasil->row();
        if ($row->jumlah>0) $balik=true;
	return $balik;
    }
    
    function isKaryawan() {
	$balik=false;
        $db=$this->db;
	$qry="select count(*) as jumlah from master_user a inner join tb_user b on a.userid=b.userid where
	a.userid=".$db->escape($this->session->userdata('yangmasuk'))." and b.hak_akses=2";
	$hasil =$db->query($qry);
        $row=$hasil->row();
        if ($row->jumlah>0) $balik=true;
	return $balik;
    }
    
    function getTotalData()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(a.nonota) as jumlah from nota_keluar a left join nota_keluar_dari b on a.nonota=b.nonota;";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    
    function getTotalDatahariini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(a.nonota) as jumlah from nota_keluar a  left join nota_keluar_dari b on a.nonota=b.nonota
	where date(a.tanggal)=date(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function getTotalDatamingguini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(a.nonota) as jumlah from nota_keluar a  left join nota_keluar_dari b on a.nonota=b.nonota
	where week(a.tanggal)=week(now()) and year(a.tanggal)=year(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function getTotalDatabulanini()
    {
        $balik="";
        $db=$this->db;
        $qry="select count(a.nonota) as jumlah from nota_keluar  a  left join nota_keluar_dari b on a.nonota=b.nonota
	where month(a.tanggal)=month(now()) and year(a.tanggal)=year(now());";
        $hasil =$db->query($qry);
        $row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    
    
    function getKondisiIsiData()
    {
	$db=$this->db;
        $balik=" where a.nonota is not null ";
	if (strlen($this->input->post('textcari'))>0)
	{
	    if (strcmp($this->input->post('pilihcari'),"nonota")==0
		 ||strcmp($this->input->post('pilihcari'),"dari")==0
		 ||strcmp($this->input->post('pilihcari'),"tujuan")==0
		 ||strcmp($this->input->post('pilihcari'),"isi")==0
		 ||strcmp($this->input->post('pilihcari'),"perihal")==0
		 ||strcmp($this->input->post('pilihcari'),"keterangan")==0
		 ||strcmp($this->input->post('pilihcari'),"sifat")==0
		 ||strcmp($this->input->post('pilihcari'),"tindak_lanjut")==0
		)
		$balik.=" and a.".$this->input->post('pilihcari')."=".$db->escape($this->input->post('textcari'))." ";
	    
		      
	    else if (strcmp($this->input->post('pilihcari'),"tanggal")==0
			||strcmp($this->input->post('pilihcari'),"tgl_masuk")==0
			||strcmp($this->input->post('pilihcari'),"tgl_disposisi")==0
		    )
		 $balik.=" and date(a.".$this->input->post('pilihcari').") = STR_TO_DATE('".$this->input->post('textcari')."','%d/%m/%Y') ";
	    else if (strcmp($this->input->post('pilihcari'),"no_rak")==0
		     ||strcmp($this->input->post('pilihcari'),"no_baris")==0
			)
	    $balik.=" and b.".$this->input->post('pilihcari')."=".$this->input->post('textcari')." ";
	}
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
	$qry="select a.nonota as jumlah from nota_keluar  a  left join nota_keluar_dari b on a.nonota=b.nonota
	".$this->getKondisiIsiData()." ".$limit.";";
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
        $ordernya=" a.no_urut asc";
        if ($this->input->post('ordernya'))
	{
	    if (strcmp($this->input->post('ordernya'),"no_rak")==0
		||strcmp($this->input->post('ordernya'),"no_baris")==0
		)
		$ordernya=" b.".$this->input->post('ordernya');
	    else
		$ordernya=" a.".$this->input->post('ordernya');
	}
        if ($this->input->post('ascnya'))
            $ordernya.=" ".$this->input->post('ascnya')." ";
        $qry="select a.no_urut,a.nonota,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv ,a.tujuan,a.perihal,a.keterangan,b.no_rak,b.no_baris 
	from nota_keluar  a  left join nota_keluar_dari b on a.nonota=b.nonota ".
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
	    
	    if ($this->isAdmin())
	    {
	    $balik.="<th scope=\"row\" class=\"check-column\"><input name=\"ck".$baris."\" id=\"ck".$baris."\" value=\"".$row->nonota."\" type=\"checkbox\"></th>";
	    }
	    
	    $balik.="<td>".$nomordata."</td>";
            $balik.="<td><a href=\"#\" class=\"row-title\" onClick=\"detail('".$row->nonota."')\">".$row->nonota."</a><div class=\"row-actions\">
            <span class=\"edit\"><a href=\"#\" onClick=\"detail('".$row->nonota."')\">Detail</a>";
	    if ($this->isAdmin()||$this->isKaryawan())
	    $balik.=" | <a href=\"#\" onClick=\"komentar('".$row->nonota."')\">Komentar</a>";
	    if ($this->isAdmin())
	    {
	    $balik.=" | <a href=\"#\" onClick=\"ubah('".$row->nonota.
            "',$('ck".$baris."'));\">Ubah</a> |
             <a href=\"#\" onClick=\"hapus1('".$row->nonota.
            "');\">Hapus</a></span></div></td>";
	    }
	    $balik.="<td style=\"text-align:center\">".$row->no_rak."&nbsp;</td>";
	    $balik.="<td style=\"text-align:center\">".$row->no_baris."&nbsp;</td>";
	    $balik.="<td>".$row->tanggalv."&nbsp;</td>";
	    $balik.="<td>".$row->tujuan."&nbsp;</td>";
	    $balik.="<td>".$row->perihal."&nbsp;</td>";
	    $balik.="<td>".$row->keterangan."&nbsp;</td>";
	    $balik.="</tr>";
        }
        return $balik;
    }
    
    function getOptionCari()
    {
        $options = array(
                  'nonota'  => 'No. Nota',
		  'tanggal'    => 'Tanggal',
		  'tgl_pengiriman'    => 'Tanggal Pengiriman',
                  'tujuan' => 'Tujuan',
                  'perihal' => 'Perihal',
                  'keterangan' => 'Keterangan',
		  'sifat' => 'Sifat Nota',
		  'no_rak'    => 'No. Rak',
		  'no_baris'    => 'No. Baris'
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
        $config['base_url'] = 'notakeluarlista?';
        $db=$this->db;
        $qry="select count(*) as jumlah from nota_keluar a  left join nota_keluar_dari b on a.nonota=b.nonota ".$this->getKondisiIsiData().";";
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
	$balik="";
	if ($this->isAdmin())
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
        $balik="<tr class=\"author-self\"><td colspan=\"2\">".form_button($data)."&nbsp;&nbsp;&nbsp;&nbsp;".form_button($data2)."</td></tr";
	    }
        return $balik;
    }
    
    function hapusklik()
    {
        $db=$this->db;
	$qry1="";
        $qry=" delete from nota_keluar ";
        $jmlData=(int)$this->input->post('pilihjmlhalaman');
        $kondisihapus="";
        $awal=true;
        for ($i=1;$i<=$jmlData;$i++)
        {
            if (strlen($this->input->post("ck".$i))>0)
            {
		$qry1="insert into tracking1 (tanggal,keterangan,nama_user) 
		values (now(),'Hapus Nota Masuk , No. Nota : ".$this->input->post("ck".$i)."','".$this->session->userdata('yangmasuk')."');";
		$db->query($qry1);
                if ($awal)
                {
                    $kondisihapus.=" where nonota=".$db->escape($this->input->post("ck".$i))." ";
                    $awal=false;
                }
                else
                    $kondisihapus.=" or nonota=".$db->escape($this->input->post("ck".$i))." ";
            }
        }
        
        $qry.=$kondisihapus;
        $db->query($qry);
	$qry=" delete from nota_keluar_dari ";
	$qry.=$kondisihapus;
        $db->query($qry);
	$qry=" delete from nota_keluar_ke ";
	$qry.=$kondisihapus;
        $db->query($qry);
	$qry=" delete from nota_keluar_komentar ";
	$qry.=$kondisihapus;
        $db->query($qry);
	$qry="select namafile from notakeluarextra ".$kondisihapus;
	$hasil =$db->query($qry);
	$direktoriuplod="gambaruplod/";
        foreach ($hasil->result() as $row)
        {
	    unlink($direktoriuplod.$row->namafile);
	}
	$qry=" delete from notakeluarextra ".$kondisihapus;
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
	    values (now(),'Tambah Nota Masuk, No. Nota : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('txnonota')))
	    ."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="insert into nota_keluar_dari (nonota,userid,no_baris,no_rak)
	    values (".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).","
	    .$db->escape($this->session->userdata('yangmasuk')).",".$this->angkaSQL($this->input->post('txno_baris'))
	    .",".$this->angkaSQL($this->input->post('txno_rak')).");";
	    $db->query($qry);
	    $qry="insert into nota_keluar (no_urut,nonota,tanggal,tujuan,keterangan,tgl_pengiriman,sifat,perihal) values (423".
	    ",".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).
	    ",".$this->convertTangal($this->input->post('txttanggal')).
	    ",".$db->escape($this->input->post('txtujuan')).
	    ",".$db->escape($this->input->post('txketerangan')).
	    ",".$this->convertTangal($this->input->post('txttgl_pengiriman')).
	    ",".$db->escape($this->input->post('txsifat')).
	    ",".$db->escape($this->input->post('txperihal')).
	    ");";
	    
	} else if (strcmp($this->input->post('bttambah1'),"ubah")==0)
	{
	    $qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Edit Nota Masuk, No. Nota : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('txnonota')))
	    ."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="delete from nota_keluar_dari where nonota=".$db->escape($this->input->post('pilihankita')).";";
	    $db->query($qry);
	    $qry="insert into nota_keluar_dari (nonota,userid,no_baris,no_rak)
	    values (".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).","
	    .$db->escape($this->session->userdata('yangmasuk')).",".$this->angkaSQL($this->input->post('txno_baris'))
	    .",".$this->angkaSQL($this->input->post('txno_rak')).");";
	    $db->query($qry);
	    $qry="update nota_keluar_komentar set nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota')))
	    ." where nonota=".$db->escape($this->input->post('pilihankita')).";";
	    $db->query($qry);
	    $qry="update nota_keluar set nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).
	    ",tanggal=".$this->convertTangal($this->input->post('txttanggal')).
	    ",tujuan=".$db->escape($this->input->post('txtujuan')).
	    ",keterangan=".$db->escape($this->input->post('txketerangan')).
	    ",tgl_pengiriman=".$this->convertTangal($this->input->post('txttgl_pengiriman')).
	    ",sifat=".$db->escape($this->input->post('txsifat')).
	    ",perihal=".$db->escape($this->input->post('txperihal')).
	    " where nonota=".$db->escape($this->input->post('pilihankita')).";";
	}
	$db->query($qry);
	$kirimkeisi=explode(";", $this->input->post('kirimkelist'));
	if (strcmp($this->input->post('bttambah1'),"ubah")==0)
		$qry="delete from nota_keluar_ke where nonota=".$db->escape($this->input->post('pilihankita')).";";
	    else
		$qry="delete from nota_keluar_ke where nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).";";
	    $db->query($qry);
	if (strlen($kirimkeisi[0])>0)
	{
	    if (strcmp($this->input->post('bttambah1'),"ubah")==0)
		$qry="delete from nota_keluar_ke where nonota=".$db->escape($this->input->post('pilihankita')).";";
	    else
		$qry="delete from nota_keluar_ke where nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).";";
	    $db->query($qry);
	    for ($i=0;$i<count($kirimkeisi);$i++)
	    {
		$qry="insert into nota_keluar_ke (nonota,userid) values ("
		.$db->escape(str_replace(" ", "", $this->input->post('txnonota'))).","
		    .$db->escape($kirimkeisi[$i]).");";
		$db->query($qry);
	    }
	}
	
	
	//tuk upload file ini
	$direktoriuplod="gambaruplod/";
	if (strcmp($this->input->post('bttambah1'),"ubah")==0)
	{
	    $qry="update notakeluarextra set nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota')))
	    ." where nonota=".$db->escape($this->input->post('pilihankita')).";";
	    $db->query($qry);
	}
	for ($i=1;$i<11;$i++)
	{
	    $nomorpostfile=$i;
	    $namapostfile="txgambar".$nomorpostfile;
	    if (strlen($_FILES[$namapostfile]['tmp_name'])>0)
	    {
		$namafileupload="gbrnk".$nomorpostfile.$this->ambilnomernya($this->input->post('txnonota')).
		$this->session->userdata('yangmasuk').".jpg";
		move_uploaded_file($_FILES[$namapostfile]['tmp_name'], $direktoriuplod.$namafileupload);
		$qry="select namafile from notakeluarextra where urut=".$nomorpostfile." 
		and nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota')))
		.";";
		$hasil =$db->query($qry);
		foreach ($hasil->result() as $row)
		{
		    unlink($direktoriuplod.$row->namafile);
		}
		$qry="delete from notakeluarextra where urut=".$nomorpostfile." 
		and nonota=".$db->escape(str_replace(" ", "", $this->input->post('txnonota')))
		.";";
		$db->query($qry);
		$qry="insert into notakeluarextra(nonota,urut,namafile,ukuuran,tipe) 
		values (".$db->escape(str_replace(" ", "", $this->input->post('txnonota')))
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
	$qry="delete from nota_keluar where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
	$qry="delete from nota_keluar_dari where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
	$qry="delete from nota_keluar_ke where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
	$qry="delete from nota_keluar_komentar where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
	$qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Hapus Nota Masuk , No. Nota : ".$this->input->post('bthapus1')."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	$qry="select namafile from notakeluarextra where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$hasil =$db->query($qry);
	$direktoriuplod="gambaruplod/";
        foreach ($hasil->result() as $row)
        {
	    unlink($direktoriuplod.$row->namafile);
	}
	$qry="delete from notakeluarextra where nonota=".$db->escape($this->input->post('bthapus1')).";";
	$db->query($qry);
    }
    function angkaSQL($isi)
    {
	$balik="NULL";
	if (strlen($isi)>0)
	    $balik=$isi;
	return $balik;
    }
}
?>