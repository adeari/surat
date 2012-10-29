<?php
class restore extends CI_Controller {
	function index()
	{
		$data['lincss']="";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			$this->load->model('restoremodel');
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"");
			$data['formrestore']=$this->restoremodel->formRestore();
			$data['pesanku']="";
			$this->load->view('restoreview',$data);
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
			$sementara = @$_POST["jadi"] ;
		} catch (Exception $e){$sementara="";}
		if (strlen($sementara)==0)
		{
			$kesalahan.="File Backup tidak bisa di upload karena ukuran file melebihi 6Mb.";
		}
		if (strlen($kesalahan)<1)
		{
			if (strlen($_FILES["filerestore"]['tmp_name'])<1)
				$kesalahan="File Backup kosong";
		}
		$data['lincss']="../";
		$data['titel'] = $this->fungsiku->balik();
		if ($this->session->userdata('yangmasuk'))
		{
			$data['pembuat'] =  $this->fungsiku->getPembuat();
			
			$this->load->model('restoremodel');
			if (strlen($kesalahan)<1)
			{
				$this->restoremodel->restoreitu();
				$kesalahan="Restore Sukses";
			}
			$data['menuatas']=$this->fungsiku->viewmenuatas
			($this->session->userdata('yangmasuk'),$this->load,$this->db,"../");
			$data['formrestore']=$this->restoremodel->formRestore();
			
			$data['pesanku']=$kesalahan;
			$this->load->view('restoreview',$data);
		}
		else
			$this->load->view('login',$data);
$this->db->close();
	}
}
?>