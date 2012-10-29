<?php
class komentarsuratkeluara extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$data['isikomentar']="isinya";
			$data['titel'] = $this->fungsiku->balik();
			$data['nosurat'] = $this->input->get('isi');
			$this->load->model('komentarsuratkeluaramodel');
			if ($this->input->post('hd'))
			{
				if (strcmp($this->input->post('hd'),"simpran")==0)
					$this->komentarsuratkeluaramodel->simpankomen();
				else if (strcmp($this->input->post('hd'),"deleti")==0)
					$this->komentarsuratkeluaramodel->deleti(); 
			}
			$data['komenlist'] = $this->komentarsuratkeluaramodel->getKomenlist();
			$data['isisurat'] = $this->komentarsuratkeluaramodel->getisisurat();
			
			$this->load->view('komentarsuratkeluaraview',$data);
		}
	}
}
?>