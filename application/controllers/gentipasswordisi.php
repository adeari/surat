<?
class gentipasswordisi extends CI_Controller {
	function index()
	{
            $data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
                        $this->load->model('gentipasswordisimodel');
			if ($this->input->post('btsimpan')) {
				if (strcmp($this->input->post('btsimpan'),"save")==0)
					$this->gentipasswordisimodel->simpan();
				else if (strcmp($this->input->post('btsimpan'),"cek")==0)
					$this->gentipasswordisimodel->cek();
			} else {
				$data['formisi']=$this->gentipasswordisimodel->getForm();
				$this->load->view('gentipasswordisiview',$data);
			}
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
        }
}
?>