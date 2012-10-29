<?php
class suratmasukisia extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$this->load->model('suratmasukisiamodel');
			$data['menuisi']=$this->suratmasukisiamodel->getMenuIsi();
			if ($this->input->post('cek'))
			{
				if (strcmp($this->input->post('cek'),"tambah")==0)
					$this->suratmasukisiamodel->tambah();
				else if (strcmp($this->input->post('cek'),"ubah")==0)
					$this->suratmasukisiamodel->ubah();
				else if (strcmp($this->input->post('cek'),"hapusgbr")==0)
					$this->suratmasukisiamodel->hapusgbr1();	
			}
			else
				$this->load->view('suratmasukisiaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();			
	}
}
?>