<?php
class notakeluarlist extends CI_Controller {
	function index()
	{
		$kesalahan="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");			
			$this->load->model('notakeluarlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notakeluarlistmodel->hapusklik();
				else
					$this->notakeluarlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notakeluarlistmodel->tambah();
			$data['lincss']="";
			$data['isidata']=$this->notakeluarlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notakeluarlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notakeluarlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notakeluarlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notakeluarlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->notakeluarlistmodel->getOptionCari();
			$data['textCari']=$this->notakeluarlistmodel->getTextCari();
			$data['btCari']=$this->notakeluarlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->notakeluarlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notakeluarlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->notakeluarlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notakeluarlistmodel->hiddenpilihan();
			$data['bthapus']=$this->notakeluarlistmodel->buttonAtas();
			$this->load->view('notakeluarlistview',$data);
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
			$this->load->model('notakeluarlistmodel');
			if ($this->input->post('bthapus1'))
			{
				if (strcmp($this->input->post('bthapus1'),"Hapus")==0)
					$this->notakeluarlistmodel->hapusklik();
				else
					$this->notakeluarlistmodel->hapus1();	
			}
			else if ($this->input->post('bttambah1'))
				$this->notakeluarlistmodel->tambah();
			$data['lincss']="../";	
			$data['isidata']=$this->notakeluarlistmodel->getIsidata();
			$data['kesalahan']=$kesalahan;
			$data['jumlahIsiData']=$this->notakeluarlistmodel->getTotalData();
			$data['jumlahIsiDataharini']=$this->notakeluarlistmodel->getTotalDatahariini();
			$data['jumlahIsiDatamingguini']=$this->notakeluarlistmodel->getTotalDatamingguini();
			$data['jumlahIsiDatabulanini']=$this->notakeluarlistmodel->getTotalDatabulanini();
			$data['optionCari']=$this->notakeluarlistmodel->getOptionCari();
			$data['textCari']=$this->notakeluarlistmodel->getTextCari();
			$data['btCari']=$this->notakeluarlistmodel->buttonCari();
			$data['optionjmlHalaman']=$this->notakeluarlistmodel->getOptionJmlHalaman();
			$data['viewHalaman']=$this->notakeluarlistmodel->getViewHalaman();
			$data['getHalamanskr']=$this->notakeluarlistmodel->getHalamanSkr();
			$data['hiddenHalaman']=$this->notakeluarlistmodel->hiddenpilihan();
			$data['bthapus']=$this->notakeluarlistmodel->buttonAtas();
			$this->load->view('notakeluarlistview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();	
	}
}
?>