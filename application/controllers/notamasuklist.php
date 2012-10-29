<?php
class notamasuklist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('notamasuklistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notamasuklistmodel->hapusklik();
				else
					$this->notamasuklistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notamasuklistmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->notamasuklistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notamasuklistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notamasuklistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notamasuklistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notamasuklistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->notamasuklistmodel->getOptionCari();
			$data['textCari']=$this->notamasuklistmodel->getTextCari();
			$data['btCari']=$this->notamasuklistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->notamasuklistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notamasuklistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->notamasuklistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notamasuklistmodel->hiddenpilihan();
			$data['bthapus']=$this->notamasuklistmodel->buttonAtas();
			$this->load->view('notamasuklistview',$data);
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
			$this->load->model('notamasuklistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notamasuklistmodel->hapusklik();
				else
					$this->notamasuklistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notamasuklistmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->notamasuklistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notamasuklistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notamasuklistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notamasuklistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notamasuklistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->notamasuklistmodel->getOptionCari();
			$data['textCari']=$this->notamasuklistmodel->getTextCari();
			$data['btCari']=$this->notamasuklistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->notamasuklistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notamasuklistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->notamasuklistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notamasuklistmodel->hiddenpilihan();
			$data['bthapus']=$this->notamasuklistmodel->buttonAtas();
			$this->load->view('notamasuklistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>