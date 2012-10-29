<?php
class pilihpenerima extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$this->load->model('pilihpenerimamodel');
			$data['hiddenHalaman']=$this->pilihpenerimamodel->hiddenpilihan();
			$data['jumlah']=$this->pilihpenerimamodel->getJmlData();
			$data['isidata']=$this->pilihpenerimamodel->getIsidata();
			$data['lincss']="";
			$data['okneh']=$this->pilihpenerimamodel->getokneh();
			$this->load->view('pilihpenerimaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
	}
	
}
?>