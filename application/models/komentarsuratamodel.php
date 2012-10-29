<?
class komentarsuratamodel extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function deleti()
    {
	$db=$this->db;
	$qry="delete from masuk_komentar where nosurat=".$db->escape($this->input->get('isi'))." and nourut=".$this->input->post('urut');
	$db->query($qry);
    }
    function ishapus($urutan)
    {
	$db=$this->db;
	$balik=false;
	$qry="select count(*) as jumlah from masuk_dari where nosurat=".$db->escape($this->input->get('isi'))
	." and userid=".$db->escape($this->session->userdata('yangmasuk'));
	$hasil = $db->query($qry);
	$row = $hasil->row();
	if ($row->jumlah>0)
	    $balik=true;
	else {
	    $qry="select count(*) as jumlah from masuk_komentar where nosurat=".$db->escape($this->input->get('isi'))
	    ." and userid=".$db->escape($this->session->userdata('yangmasuk'))." and nourut=".$urutan;
	    $hasil = $db->query($qry);
	    $row = $hasil->row();
	    if ($row->jumlah>0)
	    $balik=true;
	}
	return $balik;
    }
    function getKomenlist()
    {
	//klass di ganti comment ato comment1
	$db=$this->db;
	$nosurat=$this->input->get('isi');
	$qry="select komentar,nourut,userid  from masuk_komentar where nosurat=".$db->escape($nosurat)." order by nourut";
	$hasil = $db->query($qry);
	$ganti=true;
	$klas="";
	$balik="";
	foreach ($hasil->result() as $row)
        {
	    if ($ganti)
	    {
		$klas="comment";$ganti=false;
	    } else {
		$klas="comment1";$ganti=true;
	    }
	    $balik.="<li class=\"".$klas."\">";
	    $balik.="<article class=\"".$klas."\">";
	    $balik.="<footer class=\"comment-meta\">";
	    $balik.="<div class=\"comment-author vcard\">";
	    $balik.="<div class=\"avatar\"><strong>".$row->userid."</strong></div>";
	    if ($this->ishapus($row->nourut)) {
		$balik.="<div class=\"hapusavatar\"><a href=\"#\"
		    onClick=\"deli('".$row->nourut."')\"><img src=\"login_files/hpsp.png\"></a></div>";
	    }
	    $balik.="<font color=\"#1982d1\"><strong>12/01/2011 12:10</strong></font>";
	    $balik.="</div></footer>";
	    $balik.="<div class=\"comment-content\" id=\"komen".$row->nourut."\">".$row->komentar."</div>";
	    $balik.="</article>";
	}
	return $balik;
    }
    function simpankomen()
    {
	$db=$this->db;
	$qry="select (max(nourut)+1) as jumlah from masuk_komentar where nosurat=".$db->escape($this->input->get('isi'));
	$hasil = $db->query($qry);
	$row = $hasil->row();
	if ($row->jumlah==null)
	    $urutannya=1;
	else
	    $urutannya=(int)$row->jumlah;
	$qry="insert into masuk_komentar (nosurat,nourut,userid,komentar,jam) values (".$db->escape($this->input->get('isi'))."
	,".$urutannya."
	,".$db->escape($this->session->userdata('yangmasuk'))."
	,".$db->escape($this->input->post('comment')).",now())";
	$db->query($qry);
    }
    function getisisurat()
    {
	$balik="";
	$db=$this->db;
	$qry="select isi,keterangan from masuk where nosurat=".$db->escape($this->input->get('isi'));
	$hasil = $db->query($qry);
	$row = $hasil->row();
	$balik.="<p>".$row->isi."</p><blockquote><p>".$row->keterangan."</p></blockquote>";
	return $balik;
    }
}
?>