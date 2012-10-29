<?php
class agendaskisi extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$this->load->model('agendaskisimodel');
			$data['menuisi']=$this->agendaskisimodel->getMenuIsi();
			if ($this->input->post('cek'))
			{
				if (strcmp($this->input->post('cek'),"tambah")==0)
					$this->agendaskisimodel->tambah();
				else if (strcmp($this->input->post('cek'),"ubah")==0)
					$this->agendaskisimodel->ubah();
				else if (strcmp($this->input->post('cek'),"hapusgbr")==0)
					$this->agendaskisimodel->hapusgbr1();	
			}
			else
				$this->load->view('agendaskisiview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>