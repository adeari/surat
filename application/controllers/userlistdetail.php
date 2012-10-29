<?php
class userlistdetail extends CI_Controller {
	function yt($str)
	{
		$balik="Ya";
		if (strcmp($str,"T")==0)
			$balik="Tidak";
		return $balik;
	}
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$db=$this->db;
		$qry="select nip,userid,nama,aktif,tempat_lahir,DATE_FORMAT(tanggal_lahir, '%d/%m/%Y') as  tanggal_lahirv,".
		"alamat,telepon,DATE_FORMAT(tanggal_masuk, '%d/%m/%Y') as  tanggal_masukv ,agama,status_sipil,master,transaksi,laporan,utility".
		" from master_user where nip=".$db->escape($this->input->get('isi')).";";
		$hasil =$db->query($qry);
		$isi="";
		foreach ($hasil->result() as $row)
		{
			$isi.="<table>";
			$isi.="<tr><td colspan=\"3\" align=\"center\">Data Karyawan</td></tr>";
			$isi.="<tr><td>N I P</td><td>:</td><td>";
			$isi.=$row->nip;
			$isi.="</td></tr>";
			$isi.="<tr><td>User ID</td><td>:</td><td>";
			$isi.=$row->userid;
			$isi.="</td></tr>";
			$isi.="<tr><td>Nama</td><td>:</td><td>";
			$isi.=$row->nama;
			$isi.="</td></tr>";
			$isi.="<tr><td>Aktif</td><td>:</td><td>";
			$isi.=$this->yt($row->aktif);
			$isi.="</td></tr>";
			$isi.="<tr><td>Tempat / Tanggal Lahir</td><td>:</td><td>";
			$isi.=$row->tempat_lahir;
			$isi.=" / ";
			$isi.=$row->tanggal_lahirv;
			$isi.="</td></tr>";
			$isi.="<tr><td>Alamat</td><td>:</td><td>";
			$isi.=$row->alamat;
			$isi.="</td></tr>";
			$isi.="<tr><td>Telepon</td><td>:</td><td>";
			$isi.=$row->telepon;
			$isi.="</td></tr>";
			$isi.="<tr><td>Tanggal Masuk</td><td>:</td><td>";
			$isi.=$row->tanggal_masukv;
			$isi.="</td></tr>";
			$isi.="<tr><td>Agama</td><td>:</td><td>";
			$isi.=$row->agama;
			$isi.="</td></tr>";
			$isi.="<tr><td>Status Sipil</td><td>:</td><td>";
			$isi.=$row->status_sipil;
			$isi.="</td></tr>";
			$isi.="<tr><td>Menu Master</td><td>:</td><td>";
			$isi.=$this->yt($row->master);
			$isi.="</td></tr>";
			$isi.="<tr><td>Menu Surat</td><td>:</td><td>";
			$isi.=$this->yt($row->transaksi);
			$isi.="</td></tr>";
			$isi.="<tr><td>Menu Laporan</td><td>:</td><td>";
			$isi.=$this->yt($row->laporan);
			$isi.="</td></tr>";
			$isi.="<tr><td>Menu Utility</td><td>:</td><td>";
			$isi.=$this->yt($row->utility);
			$isi.="</td></tr>";
			$isi.="</table>";
		 
		}
		echo $isi;
		$db->close();
		}
	}
}
?>