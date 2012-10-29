<?php
class userlist2 extends CI_Controller {
/*
	function index()
	{
		$this->load->library('session');
		$this->load->library('fungsiku');
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$this->load->database();
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['usname'] = $this->fungsiku->getusname($this->session->userdata('yangmasuk'),$this->db);
			$this->load->view('userlist2',$data);
		}
		else
			$this->load->view('login',$data);
	}
*/
	function index()
	{
		$this->load->view('userlist2');
	}
}
?>