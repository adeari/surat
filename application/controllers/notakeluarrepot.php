<?php
class notakeluarrepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$namafile="notakeluar".$this->session->userdata('yangmasuk');
		$perintah=$this->fungsiku->repotawal()." notakeluar ".$this->input->get('isi')." ".$namafile;
		$last_line = system($perintah, $retval);
		$namaPDFFile="laporandownlod/".$namafile.".pdf";
		header("Content-type: application/pdf");
		readfile($namaPDFFile);
		}
	}
}
?>