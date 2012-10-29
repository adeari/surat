<?php
class isiuserlist extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$this->load->model('isiuserlistmodel');
			$data['menuisi']=$this->isiuserlistmodel->getMenuIsi();
			if ($this->input->post('bttambah'))
				echo $this->isiuserlistmodel->tambah();
			else if ($this->input->post('inihapus1'))
				echo $this->isiuserlistmodel->hapus1();
			else
				$this->load->view('isiuserlist',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>