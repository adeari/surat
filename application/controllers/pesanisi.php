<?
class pesanisi extends CI_Controller {
	function index()
	{
            $data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			if ($this->input->post('btsimpan'))
				$this->fungsiku->IsiPEsan($this->input->post('txpesan'),$this->session->userdata('yangmasuk'),$this->db);
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
                        $this->load->model('pesanmodelisi');
                        
			$data['formisi']=$this->pesanmodelisi->getForm();
			$this->load->view('pesanviewisi',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
        }
}
?>