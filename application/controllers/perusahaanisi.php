<?
class perusahaanisi extends CI_Controller {
	function index()
	{
            $data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
                        $this->load->model('perusahaanmodelisi');
                        if ($this->input->post('btsimpan'))
				$this->perusahaanmodelisi->simpan();
			$data['formisi']=$this->perusahaanmodelisi->getForm();
			$this->load->view('perusahaanviewisi',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
        }
}
?>