<?php
class notakeluarlista extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('notakeluarlistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notakeluarlistamodel->hapusklik();
				else
					$this->notakeluarlistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notakeluarlistamodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->notakeluarlistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notakeluarlistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notakeluarlistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notakeluarlistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notakeluarlistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->notakeluarlistamodel->getOptionCari();
			$data['textCari']=$this->notakeluarlistamodel->getTextCari();
			$data['btCari']=$this->notakeluarlistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->notakeluarlistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notakeluarlistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->notakeluarlistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notakeluarlistamodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->notakeluarlistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->notakeluarlistamodel->buttonAtas();
			$this->load->view('notakeluarlistaview',$data);
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
			$this->load->model('notakeluarlistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notakeluarlistamodel->hapusklik();
				else
					$this->notakeluarlistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notakeluarlistamodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->notakeluarlistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notakeluarlistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notakeluarlistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notakeluarlistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notakeluarlistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->notakeluarlistamodel->getOptionCari();
			$data['textCari']=$this->notakeluarlistamodel->getTextCari();
			$data['btCari']=$this->notakeluarlistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->notakeluarlistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notakeluarlistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->notakeluarlistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notakeluarlistamodel->hiddenpilihan();
			$data['cekboxini']="";
			if ($this->notakeluarlistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$data['bthapus']=$this->notakeluarlistamodel->buttonAtas();
			$this->load->view('notakeluarlistaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>