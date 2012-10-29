<?php
class backup extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			if (strcmp($this->input->post('cek'),"backup")==0)
			{
				$this->load->model('backupmodel');
				$this->backupmodel->backupini();
			}
			else
				$this->load->view('backupview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>