<?php
class suratmasuklista extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('suratmasuklistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratmasuklistamodel->hapusklik();
				else
					$this->suratmasuklistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratmasuklistamodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->suratmasuklistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratmasuklistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratmasuklistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratmasuklistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratmasuklistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratmasuklistamodel->getOptionCari();
			$data['textCari']=$this->suratmasuklistamodel->getTextCari();
			$data['btCari']=$this->suratmasuklistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratmasuklistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratmasuklistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratmasuklistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratmasuklistamodel->hiddenpilihan();
			$data['bthapus']=$this->suratmasuklistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->suratmasuklistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('suratmasuklistaview',$data);
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
			$this->load->model('suratmasuklistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratmasuklistamodel->hapusklik();
				else
					$this->suratmasuklistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratmasuklistamodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->suratmasuklistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratmasuklistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratmasuklistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratmasuklistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratmasuklistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratmasuklistamodel->getOptionCari();
			$data['textCari']=$this->suratmasuklistamodel->getTextCari();
			$data['btCari']=$this->suratmasuklistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratmasuklistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratmasuklistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratmasuklistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratmasuklistamodel->hiddenpilihan();
			$data['bthapus']=$this->suratmasuklistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->suratmasuklistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('suratmasuklistaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>