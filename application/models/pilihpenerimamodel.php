<?
class pilihpenerimamodel extends CI_Model {    
    function __construct()
    {
        parent::__construct();
    }
    function getokneh()
    {
	$balik = "txketerangan";
	$valuenya=$this->input->get('ii');
			if ($this->input->post('jenis'))
				$valuenya=$this->input->post('jenis');
			if (strcmp($valuenya,"suratkeluar")==0)
			$balik="txisi";
	return $balik;
    }
    function pilihtabel()
    {
	$balik="";
	$valuenya=$this->input->get('ii');
	if ($this->input->post('jenis'))
            $valuenya=$this->input->post('jenis');
	if (strcmp($valuenya,"suratmasuk")==0)
	    $balik="masuk";
	else if (strcmp($valuenya,"suratkeluar")==0)
	    $balik="keluar";
	    return $balik;
    }
    function getJmlData()
    {
	$db=$this->db;
	$qry="select count(userid) as jumlah from master_user";
	$hasil =$db->query($qry);
	$row=$hasil->row();
        $balik=$row->jumlah;
        return $balik;
    }
    function cekcklik($userid)
    {
	$balik=false;
	$db=$this->db;
	$kondisi="";$valuenya="";$valuenyaitu="";
	if ($this->input->get('uiu'))
	    $valuenya=$this->input->get('uiu');
	else if ($this->input->post('keynya'))
            $valuenya=$this->input->post('keynya');
	$qry="select count(userid) as jumlah from ".$this->pilihtabel()."_ke where nosurat=".$db->escape($valuenya)
	    ." and userid=".$db->escape($userid).";";
	$hasil =$db->query($qry);
	$row=$hasil->row();
	if ((int)$row->jumlah>0)
	    $balik=true;
	return $balik;
    }
    function getIsidata()
    {
        $balik="";
        $db=$this->db;
        $ordernya=" userid asc";
        if ($this->input->post('ordernya'))
            $ordernya=" ".$this->input->post('ordernya');
        if ($this->input->post('ascnya'))
            $ordernya.=" ".$this->input->post('ascnya')." ";
        $qry="select userid,nama from master_user order by ".$ordernya.";";
        $hasil =$db->query($qry);
        $baris=0;
        $ganti=true;
        foreach ($hasil->result() as $row)
        {
            $baris++;
            if ($ganti) {
                $balik.="<tr class=\"alternate\" valign=\"top\">";
                $ganti=false;
            } else {
                $balik.="<tr class=\"author-self\" valign=\"top\">";
                $ganti=true;
            }
	    $balik.="<th scope=\"row\" class=\"check-column\">
	    <input onClick=\"nambahin('".$row->userid."','".$row->nama."',this)\" name=\"ck".$baris."\" id=\"ck".$baris."\"
	    value=\"".$row->userid."\" type=\"checkbox\" ";
	    if ($this->cekcklik($row->userid))
	     $balik.="checked";
	    $balik.=">
	    <input type=\"hidden\" name=\"ckh".$baris."\" id=\"ckh".$baris."\" value=\"".$row->nama."\" /></th>";
	    $balik.="<td>".$row->userid."&nbsp;</td>";
	    $balik.="<td id=\"ckd".$baris."\">".$row->nama."&nbsp;</td>";
	    $balik.="</tr>";
        }
        return $balik;
    }
    function hiddenpilihan()
    {
	$balik="";
        $valuenya="userid";
        if ($this->input->post('ordernya'))
            $valuenya=$this->input->post('ordernya');
        $balik.=form_hidden('ordernya', $valuenya);
	$valuenya="asc";
        if ($this->input->post('ascnya'))
            $valuenya=$this->input->post('ascnya');
	$balik.=form_hidden('ascnya', $valuenya);
	$valuenya=$this->input->get('ii');
	if ($this->input->post('jenis'))
            $valuenya=$this->input->post('jenis');
	$balik.=form_hidden('jenis', $valuenya);
	if ($this->input->get('uiu'))
	    $valuenya=$this->input->get('uiu');
	else if ($this->input->post('keynya'))
            $valuenya=$this->input->post('keynya');
	$balik.=form_hidden('keynya', $valuenya);
        return $balik;
    }
}
?>