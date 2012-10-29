<?php
class suratmasuklist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('suratmasukmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratmasukmodel->hapusklik();
				else
					$this->suratmasukmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratmasukmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->suratmasukmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratmasukmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratmasukmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratmasukmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratmasukmodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratmasukmodel->getOptionCari();
			$data['textCari']=$this->suratmasukmodel->getTextCari();
			$data['btCari']=$this->suratmasukmodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratmasukmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratmasukmodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratmasukmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratmasukmodel->hiddenpilihan();
			$data['bthapus']=$this->suratmasukmodel->buttonAtas();
			$this->load->view('suratmasukview',$data);
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
			$this->load->model('suratmasukmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratmasukmodel->hapusklik();
				else
					$this->suratmasukmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratmasukmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->suratmasukmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratmasukmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratmasukmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratmasukmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratmasukmodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratmasukmodel->getOptionCari();
			$data['textCari']=$this->suratmasukmodel->getTextCari();
			$data['btCari']=$this->suratmasukmodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratmasukmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratmasukmodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratmasukmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratmasukmodel->hiddenpilihan();
			$data['bthapus']=$this->suratmasukmodel->buttonAtas();
			$this->load->view('suratmasukview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>