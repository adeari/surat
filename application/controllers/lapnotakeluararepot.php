<?php
class lapnotakeluararepot extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
			$namafile="lapnotakeluara".$this->session->userdata('yangmasuk');
			$perintah=$this->fungsiku->repotawal()." lapnotakeluara ".$this->input->get('dari')." ".$this->input->get('ke')." ".$namafile.
			" ".$this->session->userdata('yangmasuk');
			$last_line = system($perintah, $retval);
			$namaPDFFile="laporandownlod/".$namafile.".pdf";
			header("Content-type: application/pdf");
			readfile($namaPDFFile);
		}
	}
}
?>