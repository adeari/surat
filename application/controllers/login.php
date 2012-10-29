<?php
class login extends CI_Controller {

	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		$this->load->view('login',$data);
	}
}
?>