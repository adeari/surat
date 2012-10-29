<?php
class komentarnotakeluara extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$data['isikomentar']="isinya";
			$data['titel'] = $this->fungsiku->balik();
			$data['nonota'] = $this->input->get('isi');
			$this->load->model('komentarnotakeluaramodel');
			if ($this->input->post('hd'))
			{
				if (strcmp($this->input->post('hd'),"simpran")==0)
					$this->komentarnotakeluaramodel->simpankomen();
				else if (strcmp($this->input->post('hd'),"deleti")==0)
					$this->komentarnotakeluaramodel->deleti(); 
			}
			
			$data['komenlist'] = $this->komentarnotakeluaramodel->getKomenlist();
			$data['isisurat'] = $this->komentarnotakeluaramodel->getisisurat();
			
			$this->load->view('komentarnotakeluaraview',$data);
		}
	}
}
?>