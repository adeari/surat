<?php
class suratmasukrepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$namafile="suratmasuk".$this->session->userdata('yangmasuk');
		$perintah=$this->fungsiku->repotawal()." suratmasuk ".$this->input->get('isi')." ".$namafile;
		$last_line = system($perintah, $retval);
		$namaPDFFile="laporandownlod/".$namafile.".pdf";
		header("Content-type: application/pdf");
		readfile($namaPDFFile);
		}
	}
}
?>