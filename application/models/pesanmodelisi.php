<?
class pesanmodelisi extends CI_Model {
    function getForm()
    {
        $attributes = array('id' => 'isiform','name' => 'isiform');
	$balik=form_open('pesanisi', $attributes);
        $txpesan="";
        $db=$this->db;
        $qry="select pesan from tb_pesan where userid=".$db->escape($this->session->userdata('yangmasuk'));
        $hasil =$db->query($qry);
	    foreach ($hasil->result() as $row)
	    {
		$txpesan=$row->pesan;
		
            }
        $data=$data = array(
              'name'        => 'txpesan',
              'id'          => 'txpesan',
              'value'       =>  $txpesan,
              'size'        => '42',
	      'maxlength'        => '200',
	      'rows' => '2',
	      'cols' => '40',
	      'onFocus'	=> 'this.setStyle({ background: \'yellow\' });',
	      'onBlur'	=> 'this.setStyle({ background: \'white\' });'
            );
	$balik.="<tr class=\"alternate\" valign=\"top\">
	<td width=\"14%\">Pesan</td><td width=\"1%\">:</td><td width=\"85%\">".form_textarea($data)."</td></tr>";
	
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
}    
?>