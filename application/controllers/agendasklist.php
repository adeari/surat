<?php
class agendasklist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('agendasklistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->agendasklistmodel->hapusklik();
				else
					$this->agendasklistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->agendasklistmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->agendasklistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->agendasklistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->agendasklistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->agendasklistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->agendasklistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->agendasklistmodel->getOptionCari();
			$data['textCari']=$this->agendasklistmodel->getTextCari();
			$data['btCari']=$this->agendasklistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->agendasklistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->agendasklistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->agendasklistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->agendasklistmodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->agendasklistmodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->agendasklistmodel->buttonAtas();
			$this->load->view('agendasklistview',$data);
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
			$this->load->model('agendasklistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->agendasklistmodel->hapusklik();
				else
					$this->agendasklistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->agendasklistmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->agendasklistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->agendasklistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->agendasklistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->agendasklistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->agendasklistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->agendasklistmodel->getOptionCari();
			$data['textCari']=$this->agendasklistmodel->getTextCari();
			$data['btCari']=$this->agendasklistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->agendasklistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->agendasklistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->agendasklistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->agendasklistmodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->agendasklistmodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->agendasklistmodel->buttonAtas();
			$this->load->view('agendasklistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>