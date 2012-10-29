<?php
class helpdeh extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
				$this->load->view('helpdehview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>