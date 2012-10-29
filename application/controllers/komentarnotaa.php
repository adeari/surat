<?php
class komentarnotaa extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$data['isikomentar']="isinya";
			$data['titel'] = $this->fungsiku->balik();
			$data['nonota'] = $this->input->get('isi');
			$this->load->model('komentarnotaamodel');
			if ($this->input->post('hd'))
			{
				if (strcmp($this->input->post('hd'),"simpran")==0)
					$this->komentarnotaamodel->simpankomen();
				else if (strcmp($this->input->post('hd'),"deleti")==0)
					$this->komentarnotaamodel->deleti(); 
			}
			
			$data['komenlist'] = $this->komentarnotaamodel->getKomenlist();
			$data['isisurat'] = $this->komentarnotaamodel->getisisurat();
			
			$this->load->view('komentarnotaaview',$data);
		}
	}
}
?>