<?php
class notakeluarisi extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$this->load->model('notakeluarisimodel');
			$data['menuisi']=$this->notakeluarisimodel->getMenuIsi();
			if ($this->input->post('cek'))
			{
				if (strcmp($this->input->post('cek'),"tambah")==0)
					$this->notakeluarisimodel->tambah();
				else if (strcmp($this->input->post('cek'),"ubah")==0)
					$this->notakeluarisimodel->ubah();
				else if (strcmp($this->input->post('cek'),"hapusgbr")==0)
					$this->notakeluarisimodel->hapusgbr1();	
			}
			else
				$this->load->view('notakeluarisiview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>