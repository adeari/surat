<?php
class pilihpenerimanota extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$this->load->model('pilihpenerimanotamodel');
			$data['hiddenHalaman']=$this->pilihpenerimanotamodel->hiddenpilihan();
			$data['jumlah']=$this->pilihpenerimanotamodel->getJmlData();
			$data['isidata']=$this->pilihpenerimanotamodel->getIsidata();
			$data['lincss']="";
			$data['okneh']=$this->pilihpenerimanotamodel->getokneh();
			$this->load->view('pilihpenerimanotaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
	}
	
}
?>