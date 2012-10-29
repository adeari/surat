<?php
class downloadzip extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$this->load->library('zip');
			$inilahtempat="backupdari".
			str_replace("/", "_", $this->input->get('dari'))
			."sampai".
			str_replace("/", "_", $this->input->get('ke'));
			$this->zip->read_dir("bakup/".$inilahtempat."/", FALSE); 
			$this->zip->download($inilahtempat.".zip");
		}
	}
}
?>