<?php
class suratmasukisi extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$this->load->model('suratmasukisimodel');
			$data['menuisi']=$this->suratmasukisimodel->getMenuIsi();
			if ($this->input->post('cek'))
			{
				if (strcmp($this->input->post('cek'),"tambah")==0)
					$this->suratmasukisimodel->tambah();
				else if (strcmp($this->input->post('cek'),"ubah")==0)
					$this->suratmasukisimodel->ubah();
				else if (strcmp($this->input->post('cek'),"hapusgbr")==0)
					$this->suratmasukisimodel->hapusgbr1();	
			}
			else
				$this->load->view('suratmasukisiview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>