<?php
class suratkeluarlista extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('suratkeluarlistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratkeluarlistamodel->hapusklik();
				else
					$this->suratkeluarlistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratkeluarlistamodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->suratkeluarlistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratkeluarlistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratkeluarlistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratkeluarlistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratkeluarlistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratkeluarlistamodel->getOptionCari();
			$data['textCari']=$this->suratkeluarlistamodel->getTextCari();
			$data['btCari']=$this->suratkeluarlistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratkeluarlistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratkeluarlistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratkeluarlistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratkeluarlistamodel->hiddenpilihan();
			$data['bthapus']=$this->suratkeluarlistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->suratkeluarlistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('suratkeluarlistaview',$data);
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
			$this->load->model('suratkeluarlistamodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratkeluarlistamodel->hapusklik();
				else
					$this->suratkeluarlistamodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratkeluarlistamodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->suratkeluarlistamodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratkeluarlistamodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratkeluarlistamodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratkeluarlistamodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratkeluarlistamodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratkeluarlistamodel->getOptionCari();
			$data['textCari']=$this->suratkeluarlistamodel->getTextCari();
			$data['btCari']=$this->suratkeluarlistamodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratkeluarlistamodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratkeluarlistamodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratkeluarlistamodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratkeluarlistamodel->hiddenpilihan();
			$data['bthapus']=$this->suratkeluarlistamodel->buttonAtas();
			$data['cekboxini']="";
			if ($this->suratkeluarlistamodel->isAdmin())
			$data['cekboxini']="<th scope=\"col\" id=\"cb\" class=\"manage-column column-cb check-column\"><input type=\"checkbox\"></th>";
			$this->load->view('suratkeluarlistaview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>