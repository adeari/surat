<?
class isiuserlistmodel extends CI_Model {    
    function __construct()
    {
        parent::__construct();
    }
    function getMenuIsi()
    {
	$db=$this->db;
	$attributes = array('id' => 'isiform','name' => 'isiform');
	$balik=form_open('userlist', $attributes);
	$nipv="";$useridv="";$namav="";$aktifv="";$tempat_lahirv="";$tanggal_lahirv="";$alamatv="";$teleponv="";$tanggal_masukv="";
	$agamav="";$status_sipilv="";$masterv="";$transaksiv="";$laporanv="";$utilityv="";$pilihankita="";$hak_aksesv="0";
	$useridkita="";
	if ($this->input->post('pilihankita'))
	{
	    $pilihankita=$this->input->post('pilihankita');
	    $qry="select a.nip,a.userid,a.nama,a.aktif,a.tempat_lahir,DATE_FORMAT(a.tanggal_lahir, '%d/%m/%Y') as  tanggal_lahirv,".
		"a.alamat,a.telepon,DATE_FORMAT(a.tanggal_masuk, '%d/%m/%Y') as  tanggal_masukv ,a.agama, 
		a.status_sipil,a.master,a.transaksi,a.laporan,a.utility,b.hak_akses ".
		" from master_user a left join tb_user b on a.userid=b.userid 
		where a.nip=".$db->escape($this->input->post('pilihankita')).";";
	    $hasil =$db->query($qry);
	    foreach ($hasil->result() as $row)
	    {
		$nipv=$row->nip;
		$useridv=$row->userid;
		$useridkita=$useridv;
		$namav=strtoupper($row->nama);
		$aktifv=$row->aktif;
		$tempat_lahirv=$row->tempat_lahir;
		$tanggal_lahirv=$row->tanggal_lahirv;
		$alamatv=$row->alamat;
		$teleponv=$row->telepon;
		$tanggal_masukv=$row->tanggal_masukv;
		$agamav=strtoupper($row->agama);
		$status_sipilv=$row->status_sipil;
		$masterv=$row->master;
		$transaksiv=$row->transaksi;
		$laporanv=$row->laporan;
		$utilityv=$row->utility;
		$hak_aksesv=$row->hak_akses;
		if (strlen($hak_aksesv)<1)	$hak_aksesv="0";
	    }
	}
	$balik.=form_hidden('pilihankita', $pilihankita);
	$balik.=form_hidden('useridkita', $useridkita);
	$data = array(
              'name'        => 'txnip',
              'id'          => 'txnip',
              'value'       =>  $nipv,
              'size'        => '17',
	      'maxlength'        => '15',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td width=\"19%\">N I P</td><td width=\"1%\">:</td><td width=\"80%\">".form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txnama',
              'id'          => 'txnama',
              'value'       => $namav,
              'size'        => '32',
	      'maxlength'        => '30',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });',
	      'onKeyUp' => 'this.value=this.value.toUpperCase()',
	      'onKeyPress' => 'this.value=this.value.toUpperCase()'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Nama</td><td width=\"1%\">:</td><td>".form_input($data)."</td></tr>";
	$options = array(
                  'Y'  => 'Ya',
                  'T'    => 'Tidak'
                );
	$extraAction=" onFocus=\"this.setStyle({ background: 'yellow' });\" onBlur=\"this.setStyle({ background: 'white' });\" ";
	$extra = " id=\"optaktif\"".$extraAction;
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Aktif</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optaktif', $options, $aktifv, $extra)."</td></tr>";
	$data = array(
              'name'        => 'txuserid',
              'id'          => 'txuserid',
              'value'       => $useridv,
              'size'        => '17',
	      'maxlength'        => '15',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'/*,
	      'onKeyUp' => 'this.value=this.value.toUpperCase()',
	      'onKeyPress' => 'this.value=this.value.toUpperCase()'*/
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>User ID</td><td width=\"1%\">:</td><td>".
	form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txt4lahir',
              'id'          => 'txt4lahir',
              'value'       => $tempat_lahirv,
              'size'        => '37',
	      'maxlength'        => '35',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Tempat / Tanggal Lahir</td><td width=\"1%\">:</td><td>".
	form_input($data);
	$data = array(
              'name'        => 'txtgllahir',
              'id'          => 'txtgllahir',
              'value'       => $tanggal_lahirv,
              'size'        => '12',
	      'maxlength'        => '10',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });MaskedTextBox_NS_FocusMask(event, this.id, \'99/99/9999\');',
	      'onkeyup'	=> 'date_entry_new(this,event);',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });',
	      'onkeypress' => 'return date_input(this.id,this.name,event);',
	      'onChange' => 'date_validation(this);'
            );
	$balik.="&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;".form_input($data).
	"<a href=\"javascript:void(0)\" onclick=\"gfPop.fPopCalendar($('txtgllahir'));return false;\">".
	"<img name=\"popcal\" src=\"login_files/tgl.gif\" align=\"absmiddle\" border=\"0\" height=\"16\" width=\"16\"></a>".
	"</td></tr>";
	$data = array(
              'name'        => 'txalamat',
              'id'          => 'txalamat',
              'value'       =>  $alamatv,
              'size'        => '47',
	      'maxlength'        => '45',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Alamat</td><td width=\"1%\">:</td><td>".form_input($data).	
	"</td></tr>";
	$data = array(
              'name'        => 'txtelepon',
              'id'          => 'txtelepon',
              'value'       => $teleponv,
              'size'        => '32',
	      'maxlength'        => '30',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Telepon</td><td width=\"1%\">:</td><td>".form_input($data).
	"</td></tr>";
	$data = array(
              'name'        => 'txttglmasuk',
              'id'          => 'txttglmasuk',
              'value'       => $tanggal_masukv,
              'size'        => '12',
	      'maxlength'        => '10',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });MaskedTextBox_NS_FocusMask(event, this.id, \'99/99/9999\');',
	      'onkeyup'	=> 'date_entry_new(this,event);',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });',
	      'onkeypress' => 'return date_input(this.id,this.name,event);',
	      'onChange' => 'date_validation(this);'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Tanggal Masuk</td><td width=\"1%\">:</td><td>".form_input($data).
	"<a href=\"javascript:void(0)\" onclick=\"gfPop.fPopCalendar($('txttglmasuk'));return false;\">".
	"<img name=\"popcal\" src=\"login_files/tgl.gif\" align=\"absmiddle\" border=\"0\" height=\"16\" width=\"16\"></a>".
	"</td></tr>";
	$data = array(
              'name'        => 'txtagama',
              'id'          => 'txtagama',
              'value'       => $agamav,
              'size'        => '27',
	      'maxlength'        => '25',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });',
	      'onKeyUp' => 'this.value=this.value.toUpperCase()',
	      'onKeyPress' => 'this.value=this.value.toUpperCase()'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Agama</td><td width=\"1%\">:</td><td>".form_input($data).
	"</td></tr>";
	$options = array(
                  'Nikah'  => 'Nikah',
                  'Belum Nikah'    => 'Belum Nikah',
		  'Duda'    => 'Duda',
		  'Janda'    => 'Janda'
                );
	$extra = " id=\"optstatussipil\"".$extraAction;
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Status Sipil</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optstatussipil', $options, $status_sipilv, $extra)."</td></tr>";
	$options = array(
                  'Y'  => 'Ya',
                  'T'    => 'Tidak'
                );
	$extra = " id=\"optmaster\"".$extraAction;
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Menu Master</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optmaster', $options, $masterv, $extra)."</td></tr>";
	$extra = " id=\"optsurat\"".$extraAction;
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Menu Surat</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optsurat', $options, $transaksiv, $extra)."</td></tr>";
	$extra = " id=\"optlaporan\"".$extraAction;
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Menu Laporan</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optlaporan', $options, $laporanv, $extra)."</td></tr>";
	$extra = " id=\"optutility\"".$extraAction;
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Menu Utility</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('optutility', $options, $utilityv, $extra)."</td></tr>";
	$options = array(
		  '0'  => ' ', //bisa semuanya 
                  '1'  => 'Admin', //bisa semuanya 
                  '2'    => 'Karyawan', //bisa ngasih komentar
		  '3'    => 'Umum' //cumabisa melihat surat
                );
	$extra = " id=\"opthakakses\"".$extraAction;
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Hak Akses</td><td width=\"1%\">:</td>".
	"<td>".form_dropdown('opthakakses', $options, $hak_aksesv, $extra)."</td></tr>";
	
	if ($this->input->post('pilihankita'))
	    $valuebuttonini="Ubah";
	else
	    $valuebuttonini="Tambah";
	$data = array(
	    'name' => 'bttambah',
	    'id' => 'bttambah',
	    'value' => $valuebuttonini,
	    'type' => 'button',
	    'content' => $valuebuttonini,
	    'onClick' => 'tambah()'
	);	
	$balik.="<tr class=\"alternate\" valign=\"top\"><td></td><td></td><td>".form_button($data);
	$data = array(
	    'name' => 'btreset',
	    'id' => 'btreset',
	    'value' => 'reset',
	    'type' => 'reset',
	    'content' => 'Reset'
	);
	$balik.="&nbsp;&nbsp;&nbsp;".form_button($data);
	$data = array(
	    'name' => 'btcancel',
	    'id' => 'btcancel',
	    'value' => 'kembali',
	    'type' => 'button',
	    'content' => 'Kembali',
	     'onClick' => 'batal()'
	);
	$balik.="&nbsp;".form_button($data)."</td></tr>";
	$balik.=form_hidden('ascnya', $this->input->post('ascnya'));
	$balik.=form_hidden('halaman', $this->input->post('halaman'));
	$balik.=form_hidden('ordernya', $this->input->post('ordernya'));
	$balik.=form_hidden('pilihcari', $this->input->post('pilihcari'));
	$balik.=form_hidden('pilihjmlhalaman', $this->input->post('pilihjmlhalaman'));
	$balik.=form_hidden('textcari', $this->input->post('textcari'));
	
	$balik.=form_close();
	return $balik;
    }
    
    function hapus1()
    {
	$db=$this->db;
	$qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Hapus Data User ,Nip : ".$this->input->post('nip')."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	$qry="delete from master_user where nip='".$this->input->post('inihapus1')."';";
	$db->query($qry);
	$balik=" Karyawan dengan NIP ".$this->input->post('inihapus1')." dihapus";
    }
    
    function tambah()
    {
	$bisa=true;
	$db=$this->db;
	if ($bisa) {
	    $qry="select count(*) as jumlah from master_user where nip=".$db->escape(str_replace(" ", "", $this->input->post('nip'))).";";
	    $hasil = $db->query($qry);
	    $row = $hasil->row();
	    if ($row->jumlah>0){
		if (strcmp($this->input->post('pilihankita'),$this->input->post('nip'))!=0&&strlen($this->input->post('pilihankita'))>0) {
		    $balik = "NIP ini sudah ada";
		    $bisa=false;
		} else if (strlen($this->input->post('pilihankita'))<1)
		{
		    $balik = "NIP ini sudah ada";
		    $bisa=false;
		}
	    }
	}
	if ($bisa) {
	    $qry="select count(*) as jumlah from master_user where userid=".$db->escape($this->input->post('userid')).";";
	    $hasil = $db->query($qry);
	    $row = $hasil->row();
	    if ($row->jumlah>0){
		if ((strcmp($this->input->post('useridkita'),$this->input->post('userid'))!=0
		    &&strlen($this->input->post('useridkita'))>0
		    &&strlen($this->input->post('pilihankita'))>0)
		    ||(strlen($this->input->post('useridkita'))<1
		    &&strlen($this->input->post('pilihankita'))<1)
		    ) {
		    $balik = "User ID ini sudah ada";
		    $bisa=false;
		} 
	    }
	}
	
	if ($bisa) {
	    $tgllahir=$this->input->post('tgllahir');
	    if (strlen($tgllahir)>0)
		$tgllahir="STR_TO_DATE('".$this->input->post('tgllahir')."','%d/%m/%Y')";
	    else
		$tgllahir="NULL";
	    
	    $tglmasuk=$this->input->post('tglmasuk');
	    if (strlen($tglmasuk)>0)
		$tglmasuk="STR_TO_DATE('".$this->input->post('tglmasuk')."','%d/%m/%Y')";
	    else
		$tglmasuk="NULL";
		
	if ($this->input->post('pilihankita')) {
	    $qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Edit Data User , Nip : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('nip')))."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="delete from  tb_user where userid=".$db->escape($this->input->post('userid')).";";
	    $db->query($qry);
	    $qry="insert into tb_user (userid,hak_akses) values (".$db->escape($this->input->post('userid'))
	    .",".$this->input->post('opthakakses')
	    .");";
	    $db->query($qry);
	    $qry="update master_user set nip=".$db->escape(str_replace(" ", "", $this->input->post('nip'))).", ".
	    " nama=".$db->escape($this->input->post('nama')).", ".
	    " aktif='".$this->input->post('aktif')."', ".
	    " userid=".$db->escape($this->input->post('userid')).", ".
	    " tempat_lahir=".$db->escape($this->input->post('t4lahir')).", ".
	    " tanggal_lahir=".$tgllahir.", ".
	    " alamat=".$db->escape($this->input->post('alamat')).", ".
	    " telepon=".$db->escape($this->input->post('telepon')).", ".
	    " tanggal_masuk=".$tglmasuk.", ".
	    " agama=".$db->escape($this->input->post('agama')).", ".
	    " master='".$this->input->post('omaster')."', ".
	    " transaksi='".$this->input->post('osurat')."', ".
	    " laporan='".$this->input->post('olaporan')."', ".
	    " utility='".$this->input->post('outility')."' ".
	    " where nip=".$db->escape($this->input->post('pilihankita')).";";
	}    
	else {
	    $qry="insert into tracking1 (tanggal,keterangan,nama_user)
	    values (now(),'Tambah Data User , Nip : ".$db->escape_like_str(str_replace(" ", "", $this->input->post('nip')))."','".$this->session->userdata('yangmasuk')."');";
	    $db->query($qry);
	    $qry="insert into tb_user (userid,hak_akses) values (".$db->escape($this->input->post('userid'))
	    .",".$this->input->post('opthakakses')
	    .");";
	    $db->query($qry);
	    $qry="insert into master_user (nip,nama,aktif,userid,tempat_lahir,tanggal_lahir,alamat,telepon,".
	    "tanggal_masuk,agama,status_sipil,master,transaksi,laporan,utility,passwd) values (".
	    $db->escape(str_replace(" ", "", $this->input->post('nip'))).",".
	    $db->escape($this->input->post('nama')).",'".
	    $this->input->post('aktif')."',".
	    $db->escape($this->input->post('userid')).",".
	    $db->escape($this->input->post('t4lahir')).",".
	    $tgllahir.",".
	    $db->escape($this->input->post('alamat')).",".
	    $db->escape($this->input->post('telepon')).",".
	    $tglmasuk.",".
	    $db->escape($this->input->post('agama')).",'".
	    $this->input->post('stsipil')."','".
	    $this->input->post('omaster')."','".
	    $this->input->post('osurat')."','".
	    $this->input->post('olaporan')."','".
	    $this->input->post('outility')."',".
	    $db->escape($this->input->post('userid')).");";
	}    
	if ($db->query($qry))
		$balik="Data Karyawan ini tersimpan";
	}
	return $balik;
    }
}
?>