<?php
class notamasuklista extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('notamasuklistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notamasuklistamodel->hapusklik();
				else
					$this->notamasuklistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notamasuklistamodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->notamasuklistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notamasuklistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notamasuklistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notamasuklistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notamasuklistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->notamasuklistamodel->getOptionCari();
			$data['textCari']=$this->notamasuklistamodel->getTextCari();
			$data['btCari']=$this->notamasuklistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->notamasuklistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notamasuklistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->notamasuklistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notamasuklistamodel->hiddenpilihan();
			$data['bthapus']=$this->notamasuklistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->notamasuklistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('notamasuklistaview',$data);
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
			$this->load->model('notamasuklistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notamasuklistamodel->hapusklik();
				else
					$this->notamasuklistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notamasuklistamodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->notamasuklistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notamasuklistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notamasuklistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notamasuklistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notamasuklistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->notamasuklistamodel->getOptionCari();
			$data['textCari']=$this->notamasuklistamodel->getTextCari();
			$data['btCari']=$this->notamasuklistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->notamasuklistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notamasuklistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->notamasuklistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notamasuklistamodel->hiddenpilihan();
			$data['bthapus']=$this->notamasuklistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->notamasuklistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('notamasuklistaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>