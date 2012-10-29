<?php
class suratkeluarrepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$namafile="surakeluar".$this->session->userdata('yangmasuk');
		$perintah=$this->fungsiku->repotawal()." suratkeluar ".$this->input->get('isi')." ".$namafile;
		$last_line = system($perintah, $retval);
		$namaPDFFile="laporandownlod/".$namafile.".pdf";
		header("Content-type: application/pdf");
		readfile($namaPDFFile);
		}
	}
}
?>