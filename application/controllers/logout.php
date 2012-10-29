<?php
class logout extends CI_Controller {

	function index()
	{
		$this->session->unset_userdata('yangmasuk');
		$data['titel'] = $this->fungsiku->balik();
		$this->load->view('login',$data);
	}
}
?>