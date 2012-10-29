<?php
class komentarsurata extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$data['isikomentar']="isinya";
			$data['titel'] = $this->fungsiku->balik();
			$data['nosurat'] = $this->input->get('isi');
			$this->load->model('komentarsuratamodel');
			if ($this->input->post('hd'))
			{
				if (strcmp($this->input->post('hd'),"simpran")==0)
					$this->komentarsuratamodel->simpankomen();
				else if (strcmp($this->input->post('hd'),"deleti")==0)
					$this->komentarsuratamodel->deleti(); 
			}
			$data['komenlist'] = $this->komentarsuratamodel->getKomenlist();
			$data['isisurat'] = $this->komentarsuratamodel->getisisurat();
			
			$this->load->view('komentarsurataview',$data);
		}
	}
}
?>