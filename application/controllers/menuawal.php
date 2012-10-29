<?php
class menuawal extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$db=$this->db;
			$qry="select count(*) as jumlah from masuk";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['suratmasuk']=$row->jumlah;
			$qry="select count(*) as jumlah from keluar";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['suratkeluar']=$row->jumlah;
			$qry="select count(*) as jumlah from nota_masuk";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['notamasuk']=$row->jumlah;
			$qry="select count(*) as jumlah from nota_keluar";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['notakeluar']=$row->jumlah;
			$qry="select count(*) as jumlah from agendaspt";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['agendaspt']=$row->jumlah;
			$qry="select count(*) as jumlah from agendask";
			$hasil = $db->query($qry);
			$row = $hasil->row();
			$data['agendask']=$row->jumlah;
			$this->load->view('menuawal',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
	}
}
?>