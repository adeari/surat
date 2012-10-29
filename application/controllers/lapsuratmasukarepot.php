<?php
class lapsuratmasukarepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$namafile="lapsuratmasuka".$this->session->userdata('yangmasuk');
			$perintah=$this->fungsiku->repotawal()." lapsuratmasuka ".$this->input->get('dari')." ".$this->input->get('ke')." ".$namafile.
			" ".$this->session->userdata('yangmasuk');
			$last_line = system($perintah, $retval);
			$namaPDFFile="laporandownlod/".$namafile.".pdf";
			header("Content-type: application/pdf");
			readfile($namaPDFFile);
		}
	}
}
?>