<?php
class agendaskrepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$namafile="agendask".$this->session->userdata('yangmasuk');
		$perintah=$this->fungsiku->repotawal()." agendask ".$this->input->get('isi')." ".$namafile;
		$last_line = system($perintah, $retval);
		$namaPDFFile="laporandownlod/".$namafile.".pdf";
		header("Content-type: application/pdf");
		readfile($namaPDFFile);
		}
	}
}
?>