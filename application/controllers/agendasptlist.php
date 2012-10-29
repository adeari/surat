<?php
class agendasptlist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('agendasptlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->agendasptlistmodel->hapusklik();
				else
					$this->agendasptlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->agendasptlistmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->agendasptlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->agendasptlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->agendasptlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->agendasptlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->agendasptlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->agendasptlistmodel->getOptionCari();
			$data['textCari']=$this->agendasptlistmodel->getTextCari();
			$data['btCari']=$this->agendasptlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->agendasptlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->agendasptlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->agendasptlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->agendasptlistmodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->agendasptlistmodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->agendasptlistmodel->buttonAtas();
			$this->load->view('agendasptlistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();				
	}
	
	function doupload()
	{
		$sementara="bisa";
		$kesalahan="";
		try {
			$sementara = @$_POST["pilihjmlhalaman"] ;
		} catch (Exception $e){$sementara="";}
		if (strlen($sementara)==0)
		{
			$kesalahan.="<tr  class=\"author-self\" valign=\"top\">";
			$kesalahan.="<td colspan=\"2\"><div align=\"center\">";
			$kesalahan.="Data tidak tersimpan karena ukuran file melebihi 6Mb. Upload file satu persatu, dan bisa di lanjutkan di Click ubah";
			$kesalahan.="</div></td></tr>";
			
		}
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"../");			
			$this->load->model('agendasptlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->agendasptlistmodel->hapusklik();
				else
					$this->agendasptlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->agendasptlistmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->agendasptlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->agendasptlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->agendasptlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->agendasptlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->agendasptlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->agendasptlistmodel->getOptionCari();
			$data['textCari']=$this->agendasptlistmodel->getTextCari();
			$data['btCari']=$this->agendasptlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->agendasptlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->agendasptlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->agendasptlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->agendasptlistmodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->agendasptlistmodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->agendasptlistmodel->buttonAtas();
			$this->load->view('agendasptlistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>