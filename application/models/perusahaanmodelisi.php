<?
class perusahaanmodelisi extends CI_Model {
    function getForm()
    {
        $attributes = array('id' => 'isiform','name' => 'isiform');
	$balik=form_open('perusahaanisi', $attributes);
        $nama_pershv="";$alamatv="";$teleponv="";
        $db=$this->db;
        $qry="select nama_persh,alamat,telp from perusahaan";
        $hasil =$db->query($qry);
	    foreach ($hasil->result() as $row)
	    {
		$nama_pershv=$row->nama_persh;
		$alamatv=$row->alamat;
		$teleponv=$row->telp;
            }
        $data=$data = array(
              'name'        => 'txnama_persh',
              'id'          => 'txnama_persh',
              'value'       =>  $nama_pershv,
              'size'        => '33',
	      'maxlength'        => '30',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td width=\"14%\">Nama Perusahaan</td><td width=\"1%\">:</td><td width=\"85%\">".form_input($data)."</td></tr>";
	$data=$data = array(
              'name'        => 'txalamat',
              'id'          => 'txalamat',
              'value'       =>  $alamatv,
              'size'        => '53',
	      'maxlength'        => '50',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td width=\"14%\">Alamat Perusahaan</td><td width=\"1%\">:</td><td width=\"85%\">".form_input($data)."</td></tr>";
	$data=$data = array(
              'name'        => 'txtelepon',
              'id'          => 'txtelepon',
              'value'       =>  $teleponv,
              'size'        => '38',
	      'maxlength'        => '35',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td width=\"14%\">Telepon</td><td width=\"1%\">:</td><td width=\"85%\">".form_input($data)."</td></tr>";
	$data = array(
	    'name' => 'btsimpan',
	    'id' => 'btsimpan',
	    'value' => 'simpan',
	    'type' => 'submit',
	    'content' => 'Simpan'
	);	
	$balik.="<tr class=\"author-self\" valign=\"top\"><td></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;".form_button($data)."</td></tr>";
        $balik.=form_close();
	return $balik;
    }
    
    function simpan() {
        $db=$this->db;
        $nama_persh="-";$alamat="-";$telepon="";
        if ($this->input->post('txnama_persh')) $nama_persh=$this->input->post('txnama_persh');
        if ($this->input->post('txalamat')) $alamat=$this->input->post('txalamat');
        if ($this->input->post('txtelepon')) $telepon=$this->input->post('txtelepon');
        $qry="update perusahaan set nama_persh=".$db->escape($nama_persh).",alamat=".$db->escape($alamat).",telp=".$db->escape($telepon);
        $db->query($qry);
    }
}    
?>