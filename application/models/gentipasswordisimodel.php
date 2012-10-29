<?
class gentipasswordisimodel extends CI_Model {
    function getForm()
    {
        $attributes = array('id' => 'isiform','name' => 'isiform');
	$balik=form_open('perusahaanisi', $attributes);
	$balik.="<tr class=\"alternate\" valign=\"top\"><td width=\"14%\">User Name</td><td width=\"1%\">:</td><td width=\"85%\">".$this->session->userdata('yangmasuk')."</td></tr>";
        $data=$data = array(
              'name'        => 'passlama',
              'id'          => 'passlama',
              'size'        => '17',
	      'maxlength'        => '15',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td width=\"19%\">Password Lama</td><td width=\"1%\">:</td><td width=\"80%\">".form_password($data)."</td></tr>";
	$data=$data = array(
              'name'        => 'passbaru',
              'id'          => 'passbaru',
              'size'        => '17',
	      'maxlength'        => '15',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\"><td>Password baru</td><td>:</td><td>".form_password($data)."</td></tr>";
	$data=$data = array(
              'name'        => 'passbaru1',
              'id'          => 'passbaru1',
              'size'        => '17',
	      'maxlength'        => '15',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"author-self\" valign=\"top\"><td>Ulangi Password baru</td><td>:</td><td>".form_password($data)."</td></tr>";
	$data = array(
	    'name' => 'btsimpan',
	    'id' => 'btsimpan',
	    'value' => 'simpan',
	    'type' => 'button',
	    'content' => 'Simpan',
	    'onClick' => 'masuk()'
	);	
	$balik.="<tr class=\"alternate\" valign=\"top\"><td></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;".form_button($data)."</td></tr>";
        $balik.=form_close();
	return $balik;
    }
    
    function simpan() {
        $db=$this->db;
        $qry="update master_user set passwd=".$db->escape($this->input->post('a'))
	." where userid=".$db->escape($this->session->userdata('yangmasuk'))
	." and passwd=".$db->escape($this->input->post('b'));
        $db->query($qry);
    }
    
    function cek() {
        $db=$this->db;
        $qry="select count(*) as jumlah from master_user where userid=".$db->escape($this->session->userdata('yangmasuk'))
	." and passwd=".$db->escape($this->input->post('a'));
	$hasil = $db->query($qry);
	$row = $hasil->row();
	if ($row->jumlah>0)
		echo "y";
	else echo "t";
        $db->query($qry);
    }
}    
?>