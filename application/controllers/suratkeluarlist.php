<?php
class suratkeluarlist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('suratkeluarlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratkeluarlistmodel->hapusklik();
				else
					$this->suratkeluarlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratkeluarlistmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->suratkeluarlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratkeluarlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratkeluarlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratkeluarlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratkeluarlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratkeluarlistmodel->getOptionCari();
			$data['textCari']=$this->suratkeluarlistmodel->getTextCari();
			$data['btCari']=$this->suratkeluarlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratkeluarlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratkeluarlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratkeluarlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratkeluarlistmodel->hiddenpilihan();
			$data['bthapus']=$this->suratkeluarlistmodel->buttonAtas();
			$this->load->view('suratkeluarlistview',$data);
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
			$this->load->model('suratkeluarlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->suratkeluarlistmodel->hapusklik();
				else
					$this->suratkeluarlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->suratkeluarlistmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->suratkeluarlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->suratkeluarlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->suratkeluarlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->suratkeluarlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->suratkeluarlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->suratkeluarlistmodel->getOptionCari();
			$data['textCari']=$this->suratkeluarlistmodel->getTextCari();
			$data['btCari']=$this->suratkeluarlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->suratkeluarlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->suratkeluarlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->suratkeluarlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->suratkeluarlistmodel->hiddenpilihan();
			$data['bthapus']=$this->suratkeluarlistmodel->buttonAtas();
			$this->load->view('suratkeluarlistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>