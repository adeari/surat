<?php
class userlist extends CI_Controller {
	function index()
	{
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('userlistmodel');
			if ($this->input->post('bthapus1'))
				$this->userlistmodel->hapusklik();
			$data['isidata']=$this->userlistmodel->getIsidata();
			$data['jumlahIsiData']=$this->userlistmodel->getTotalData();
			$data['optionCari']=$this->userlistmodel->getOptionCari();
			$data['textCari']=$this->userlistmodel->getTextCari();
			$data['btCari']=$this->userlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->userlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->userlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->userlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->userlistmodel->hiddenpilihan();
			$data['bthapus']=$this->userlistmodel->buttonAtas();
			$this->load->view('userlist',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
	}
}
?>