<?
class suratkeluarisiamodel extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function getFileDarinya($urut,$db)
    {
	$balik="";
	if (strlen($this->input->post('pilihankita'))>0)
	{
	    $qry="select namafile from suratkeluarextra  where urut=".$urut." 
		and nosurat=".$db->escape($this->input->post('pilihankita')).";";
	    $hasil =$db->query($qry);
	    if ($hasil->num_rows() > 0)
	    {
		$row=$hasil->row();
		$balik=$row->namafile;
	    }
	}
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
    
    function isigambardulu($nosurate)
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
    
    function ambilnokendali()
    {
	$db=$this->db;
	$qry="SELECT no_kendali AS jumlah FROM keluar WHERE no_kendali REGEXP '^[0-9]+$'
	AND length( no_kendali ) = (SELECT max( length( no_kendali ) ) AS jumlah FROM keluar WHERE no_kendali REGEXP '^[0-9]+$' ) ";
	    $hasil =$db->query($qry);
	    $nomor=0;
	    foreach ($hasil->result() as $row)
	    {
		if ((int)$row->jumlah>(int)$nomor)
		    $nomor=(int)$row->jumlah;
	    }
	$nomor++;
	return $nomor;
    }
    function ambilnoberkas()
    {
	$db=$this->db;
	$qry="select no_berkas as jumlah from keluar where no_berkas REGEXP '^[0-9]+$'
	AND length( no_berkas ) = (SELECT max( length( no_berkas ) ) AS jumlah FROM keluar WHERE no_berkas REGEXP '^[0-9]+$' ) ";
	    $hasil =$db->query($qry);
	    $nomor=0;
	    foreach ($hasil->result() as $row)
	    {
		if ((int)$row->jumlah>(int)$nomor)
		    $nomor=(int)$row->jumlah;
	    }
	    $nomor++;
	return $nomor;
    }
    
    function getMenuIsi()
    {
	$balik="";
	$db=$this->db;
	$pilihankita="";
	$attributes = array('id' => 'isiform','name' => 'isiform');
	$balik.="<table class=\"wp-list-table widefat posts\" cellspacing=\"0\"><tr><th colspan=\"3\">&nbsp;</th></tr><tbody>";
	$balik.=form_open_multipart('suratkeluarlista/doupload', $attributes);
	$nosuratv="";$txttanggalv=date('d/m/Y');$dariv="";$tujuanv="";$keteranganv="";$isiv="";
	$no_berkasv="";$no_kendaliv="";$options = "";$no_barisv="";$no_rakv="";
	
	if ($this->input->post('pilihankita'))
	{
	    $pilihankita=$this->input->post('pilihankita');
	    $qry="select  a.nosurat,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv 
	    ,a.dari,a.tujuan,a.keterangan,a.isi,a.no_berkas,
	    a.no_kendali,b.no_baris,b.no_rak from keluar a left join keluar_dari b on a.nosurat=b.nosurat
	    where a.nosurat=".$db->escape($this->input->post('pilihankita')).";";
	    $hasil =$db->query($qry);
	    foreach ($hasil->result() as $row)
	    {
		$nosuratv=$row->nosurat;
		$txttanggalv=$row->tanggalv;
		$dariv=$row->dari;
		$tujuanv=$row->tujuan;
		$keteranganv=$row->keterangan;
		$isiv=$row->isi;
		$no_berkasv=$row->no_berkas;
		$no_kendaliv=$row->no_kendali;
		$no_barisv=$row->no_baris;
		$no_rakv=$row->no_rak;
		$qry="select a.userid,b.nama from keluar_ke a inner join master_user b on a.userid=b.userid
		where nosurat=".$db->escape($this->input->post('pilihankita')).";";
		$hasil =$db->query($qry);
		$i=0;
		if ($hasil->num_rows() > 0)
		{
		    foreach ($hasil->result() as $row)
		    {
			$options[$row->userid] =  $row->nama;
			$i++;
		    }
		}
		else
		     $options = array(''  => '-- Pilih Penerima --');
		$this->isigambardulu($nosuratv);
	    }
	} else {
	    $no_kendaliv=$this->ambilnokendali();
	    $no_berkasv=$this->ambilnoberkas();
	    $options = array(''  => '-- Pilih Penerima --');
	}
	$balik.=form_hidden('pilihankita', $pilihankita);
	$balik.=form_hidden('kirimkelist', '');
	$balik.=form_hidden('bttambah1', '');
	$data = array(
              'name'        => 'txnosurat',
              'id'          => 'txnosurat',
              'value'       =>  $nosuratv,
              'size'        => '53',
	      'maxlength'        => '50',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td width=\"19%\">No. surat</td><td width=\"1%\">:</td><td width=\"80%\">".form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txttanggal',
              'id'          => 'txttanggal',
              'value'       => $txttanggalv,
              'size'        => '12',
	      'maxlength'        => '10',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });MaskedTextBox_NS_FocusMask(event, this.id, \'99/99/9999\');',
	      'onkeyup'	=> 'date_entry_new(this,event);',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });',
	      'onkeypress' => 'return date_input(this.id,this.name,event);',
	      'onChange' => 'date_validation(this);'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Tanggal Surat</td><td >:</td><td>".form_input($data).
	"<a href=\"javascript:void(0)\" onclick=\"gfPop.fPopCalendar($('txttanggal'));return false;\">".
	"<img name=\"popcal\" src=\"login_files/tgl.gif\" align=\"absmiddle\" border=\"0\" height=\"16\" width=\"16\"></a>".
	"</td></tr>";
	$data = array(
              'name'        => 'txdari',
              'id'          => 'txdari',
              'value'       =>  $dariv,
              'size'        => '103',
	      'maxlength'        => '100',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Bagian / SUBDIN</td><td >:</td><td>".form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txtujuan',
              'id'          => 'txtujuan',
              'value'       =>  $tujuanv,
	      'rows' => '2',
	      'cols' => '63',
	      'size' => '60',
	      'maxlength' => '100',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Tujuan</td><td >:</td><td>".form_textarea($data)."</td></tr>";
	$extraAction=" onFocus=\"this.setStyle({ background: 'yellow' });pilihuser();\" onBlur=\"this.setStyle({ background: 'white' });\" ";
	$extra=" size=\"5\" id=\"kirimke\" ".$extraAction;
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Kirim Kepada</td><td >:</td><td>
	".form_multiselect('kirimke', $options,null,$extra)."</td></tr>";
	
	$data = array(
              'name'        => 'txisi',
              'id'          => 'txisi',
              'value'       =>  $isiv,
	      'rows' => '4',
	      'cols' => '73',
	      'size' => '70',
	      'maxlength' => '255',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Perihal</td><td >:</td><td>".form_textarea($data)."</td></tr>";
	$data = array(
              'name'        => 'txketerangan',
              'id'          => 'txketerangan',
              'value'       =>  $keteranganv,
	      'rows' => '3',
	      'cols' => '63',
	      'size' => '60',
	      'maxlength' => '100',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Keterangan</td><td >:</td><td>".form_textarea($data)."</td></tr>";
	$data = array(
              'name'        => 'txno_berkas',
              'id'          => 'txno_berkas',
              'value'       =>  $no_berkasv,
              'size'        => '28',
	      'maxlength'        => '25',
	      'style'	=> 'text-align:right',
	      'onkeypress' => 'return isNumberKey(event)',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>No. Berkas</td><td >:</td><td>".form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txno_kendali',
              'id'          => 'txno_kendali',
              'value'       =>  $no_kendaliv,
              'size'        => '28',
	      'maxlength'        => '45',
	      'style'	=> 'text-align:right',
	      'onkeypress' => 'return isNumberKey(event)',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>No. Kendali</td><td >:</td><td>".form_input($data)."</td></tr>";
	
	$data = array(
              'name'        => 'txno_rak',
              'id'          => 'txno_rak',
              'value'       =>  $no_rakv,
              'size'        => '10',
	      'maxlength'        => '15',
	      'style'	=> 'text-align:right',
	      'onkeypress' => 'return isNumberKey(event)',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>No. Rak</td><td >:</td><td>".form_input($data)."</td></tr>";
	$data = array(
              'name'        => 'txno_baris',
              'id'          => 'txno_baris',
              'value'       =>  $no_barisv,
              'size'        => '10',
	      'maxlength'        => '15',
	      'style'	=> 'text-align:right',
	      'onkeypress' => 'return isNumberKey(event)',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>No. Baris</td><td >:</td><td>".form_input($data)."</td></tr>";
	
	
	
	$direktoriuplod="gambaruplod/";
	$balik.="<tr class=\"author-self\"><td colspan=\"3\"><center><strong><font size=\"3\" color=\"magenta\">S C A N N E R</font></strong></center></td></tr>";
	
	
	
	$uruturut=1;
	$alternate=true;
	$cssnei="author-self";
	for ($uruturut=1;$uruturut<11;$uruturut++)
	{
	    $urtgbr=$uruturut;
	    $gambar1v=$this->getFileDarinya($urtgbr,$db);
	    if (strlen($gambar1v)>0)
	    {
		$data = array(
		    'name' => "bthpsgbr".$urtgbr,
		    'id' => "bthpsgbr".$urtgbr,
		    'value' => "HapusGambar".$urtgbr,
		    'type' => "button",
		    'content' => "Hapus Gambar ".$urtgbr,
		    'onClick' => "hapusgbr('".$urtgbr."')"
		);
		if ($alternate)	{$alternate=false; $cssnei="alternate";} else {$alternate=true; $cssnei="author-self";}
		$balik.="<tr class=\"".$cssnei."\" valign=\"top\"><td>Hasil Gambar ".$urtgbr."</td><td>:</td><td id=\"ihik".$urtgbr."\" valign=\"top\">".
		"<a  href=\"#\" onClick=\"window.open('".
		$direktoriuplod.$gambar1v."','inih','left='+Math.ceil(screen.width/2-500)+',top='+
		Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');\">".
		"<img src=\"".$direktoriuplod.$gambar1v."\" width=\"150\" height=\"200\"></a> &nbsp;".form_button($data)."</td></tr>";
	    }
	    $data = array(
		  'name'        => "txgambar".$urtgbr,
		  'id'          => "txgambar".$urtgbr,
		  'size'       => 60,
		  'text'	=> "Pilih Gambar",
		  'onChange' => "checkGbr('".$urtgbr."')"
	    );
	    if ($alternate)	{$alternate=false; $cssnei="alternate";} else {$alternate=true; $cssnei="author-self";}
	    $balik.="<tr class=\"".$cssnei."\" valign=\"top\"><td>Gambar ".$urtgbr."</td><td >:</td><td>".form_upload($data)."</td></tr>";
	}
	
	
	
	if ($this->input->post('pilihankita'))
	    $data = array(
		'name' => 'bttambah',
		'id' => 'bttambah',
		'value' => 'Ubah',
		'type' => 'button',
		'content' => 'Ubah',
		'onClick' => 'ubah()'
	    );	
	
	else
	    $data = array(
		'name' => 'bttambah',
		'id' => 'bttambah',
		'value' => 'Tambah',
		'type' => 'button',
		'content' => 'Tambah',
		'onClick' => 'tambah()'
	    );
	    if ($alternate)	{$alternate=false; $cssnei="alternate";} else {$alternate=true; $cssnei="author-self";}
	$balik.="<tfoot><tr class=\"".$cssnei."\" valign=\"top\"><td></td><td></td><td>".form_button($data);
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
	$balik.="&nbsp;".form_button($data)."</td></tr></tfoot>";
	$balik.="</tbody></table>";
	
	
	$balik.=form_hidden('ascnya', $this->input->post('ascnya'));
	$balik.=form_hidden('halaman', $this->input->post('halaman'));
	$balik.=form_hidden('ordernya', $this->input->post('ordernya'));
	$balik.=form_hidden('pilihcari', $this->input->post('pilihcari'));
	$balik.=form_hidden('pilihjmlhalaman', $this->input->post('pilihjmlhalaman'));
	$balik.=form_hidden('textcari', $this->input->post('textcari'));
	
	$balik.=form_close();
	return $balik;
    }
    
    function tambah()
    {
	$db=$this->db;
	$bisa=true;
	
	$qry="select count(*) as jumlah from keluar where nosurat=".$db->escape($this->input->post("nosurat")).";";
	$hasil = $db->query($qry);
	    $row = $hasil->row();
	    if ($row->jumlah>0) {
		echo "Nomor Surat ini sudah ada";
		$bisa=false;
	    }
	if (strlen($this->input->post("no_berkas"))>0&&$bisa)
	{
		$qry="select count(*) as jumlah from keluar where no_berkas=".$db->escape($this->input->post("no_berkas")).";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Nomor Berkas sudah ada silahkan menambah atau mengubah Nomor Berkas";
		    $bisa=false;
		}
	}    
	if (strlen($this->input->post("no_kendali"))>0&&$bisa)
	{
		$qry="select count(*) as jumlah from keluar where no_kendali=".$db->escape($this->input->post("no_kendali")).";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Nomor Kendali sudah ada silahkan menambah atau mengubah Nomor kendali";
		    $bisa=false;
		}
	}
	if ($bisa&&strlen($this->input->post("no_baris"))>0&&strlen($this->input->post("no_rak"))>0)
	{
		$qry="select count(*) as jumlah from keluar_dari where no_rak=".
		$this->input->post("no_rak")." and no_baris=".$this->input->post("no_baris").";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Rak ".$this->input->post("no_rak")." dan baris ".$this->input->post("no_baris")." sudah terisi ";
		    $bisa=false;
		}
	}
	if ($bisa){
	    echo "y";
	}
    }
    
    function ubah()
    {
	$no_kendaliasal="";
	$no_berkasasal="";
	$no_barisasal="";
	$no_rakasal="";
	$bisa=true;
	$db=$this->db;
	if (strcmp($this->input->post("nosurat"),$this->input->post("nosuratubah"))!=0)
	{
	    $qry="select count(*) as jumlah from keluar where nosurat=".$db->escape($this->input->post("nosurat")).";";
	    $hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Nomor Surat ini sudah ada";
		    $bisa=false;
		}
	}
	$qry="select a.no_berkas,a.no_kendali,b.no_rak,b.no_baris from keluar a left join keluar_dari b on a.nosurat=b.nosurat
	where a.nosurat=".$db->escape($this->input->post("nosuratubah")).";";
	$hasil = $db->query($qry);
	$row = $hasil->row();
	$no_berkasasal=$row->no_berkas;
	$no_kendaliasal=$row->no_kendali;
	$no_barisasal=$row->no_baris;
	$no_rakasal=$row->no_rak;
	
	    if ($bisa&&strlen($this->input->post("no_berkas"))>0
		&&strcmp($this->input->post("no_berkas"),$no_berkasasal)!=0)
	    {
	    
		$qry="select count(*) as jumlah from keluar where no_berkas=".$db->escape($this->input->post("no_berkas")).";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Nomor Berkas sudah ada silahkan menambah atau mengubah Nomor Berkas";
		    $bisa=false;
		}
	    }
	
	    if ($bisa&&strlen($this->input->post("no_kendali"))>0
		&&strcmp($this->input->post("no_kendali"),$no_kendaliasal)!=0)
	    {
		$qry="select count(*) as jumlah from keluar where no_kendali=".$db->escape($this->input->post("no_kendali")).";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Nomor Kendali sudah ada silahkan menambah atau mengubah Nomor kendali";
		    $bisa=false;
		}
	    }
	 
	    if ($bisa&&strlen($this->input->post("no_baris"))>0&&strlen($this->input->post("no_rak"))>0&&
		strcmp($no_barisasal,$this->input->post("no_baris"))!=0&&strcmp($no_rakasal,$this->input->post("no_rak"))!=0)
	    {
		$qry="select count(*) as jumlah from keluar_dari where no_rak=".
		$this->input->post("no_rak")." and no_baris=".$this->input->post("no_baris").";";
		$hasil = $db->query($qry);
		$row = $hasil->row();
		if ($row->jumlah>0) {
		    echo "Rak ".$this->input->post("no_rak")." dan baris ".$this->input->post("no_baris")." sudah terisi ";
		    $bisa=false;
		}
	    }
	
	if ($bisa){
	    echo "y";
	}
    }
    
    function hapusgbr1()
    {
	$db=$this->db;
	$qry="select namafile from suratkeluarextra where
	nosurat=".$db->escape($this->input->post("nosurat"))." and urut=".$this->input->post("nomorgambar").";";
	$hasil =$db->query($qry);
	$direktoriuplod="gambaruplod/";
        foreach ($hasil->result() as $row)
        {
	    unlink($direktoriuplod.$row->namafile);
	}
	$qry="delete from suratkeluarextra where  nosurat=".$db->escape($this->input->post("nosurat"))." and urut=".$this->input->post("nomorgambar").";";
	echo $qry;
	if ($db->query($qry))
	    echo "y";
    }
}
?>