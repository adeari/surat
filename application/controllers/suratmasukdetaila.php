<?php
class suratmasukdetaila extends CI_Controller {
	function kirimke($ini)
	{
		$db=$this->db;
		$balik="";
		$qry="select b.nama from masuk_ke a inner join master_user b on a.userid=b.userid  where a.nosurat=".$db->escape($ini).";";
		$hasil =$db->query($qry);
		foreach ($hasil->result() as $row)
		{
			if (strlen($balik)<1)
				$balik=$row->nama;
			else
				$balik.=",".$row->nama;
		}
		return $balik;
	}
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$db=$this->db;
		$direktoriuplod="gambaruplod/";
		$this->load->model('suratmasukisimodel');
		$this->suratmasukisimodel->isigambardulu($this->input->get('isi'));
		$qry="select a.nosurat,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv,DATE_FORMAT(a.tgl_masuk, '%d/%m/%Y') as  tgl_masukv 
		,a.dari,a.tujuan,a.keterangan,a.sifat_surat,a.isi,a.disposisi,DATE_FORMAT(a.tgl_disposisi, '%d/%m/%Y') as  tgl_disposisiv,a.no_berkas, 
		a.no_kendali,a.tindak_lanjut,c.no_rak,c.no_baris from masuk a left join masuk_dari c on a.nosurat=c.nosurat 
		where a.nosurat=".$db->escape($this->input->get('isi')).";";
		$hasil =$db->query($qry);
		$isi="";
		foreach ($hasil->result() as $row)
		{
			$isi.="<table>";
			$isi.="<tr><td colspan=\"3\" align=\"center\">Surat Masuk</td>";
			$isi.="<td rowspan=\"13\" valign=\"midle\" width=\"30%\">";
			$qry="select namafile from suratextra where nosurat=".$db->escape($this->input->get('isi'))." and urut in (1,2);";
			$hasil1 =$db->query($qry);
			
			foreach ($hasil1->result() as $row1)
			{
				$isi.="<a href=\"#\" onClick=\"window.open('".
				$direktoriuplod.$row1->namafile."','inih','left='+Math.ceil(screen.width/2-500)+',top='+
				Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');\">".
				"<img src=\"".$direktoriuplod.$row1->namafile."\" width=\"170\" height=\"220\"></a><br/>";
			}
			$isi.="</td>";
			$isi.="</tr>";
			$isi.="<tr valign=\"top\" width=\"14%\"><td>No. Surat</td><td width=\"1%\">:</td><td width=\"55%\">";
			$isi.=$row->nosurat;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Perihal</td><td>:</td><td>";
			$isi.=$row->isi;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Surat</td><td>:</td><td>";
			$isi.=$row->tanggalv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Masuk</td><td>:</td><td>";
			$isi.=$row->tgl_masukv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Dari</td><td>:</td><td>";
			$isi.=$row->dari;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tujuan</td><td>:</td><td>";
			$isi.=$row->tujuan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Kirim ke</td><td>:</td><td>";
			$isi.= $this->kirimke($row->nosurat);
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Keterangan</td><td>:</td><td>";
			$isi.=$row->keterangan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Sifat surat</td><td>:</td><td>";
			$isi.=$row->sifat_surat;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Disposisi</td><td>:</td><td>";
			$isi.=$row->disposisi;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Disposisi</td><td>:</td><td>";
			$isi.=$row->tgl_disposisiv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No Berkas</td><td>:</td><td>";
			$isi.=$row->no_berkas;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Kendali</td><td>:</td><td>";
			$isi.=$row->no_kendali;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tindak Lanjut</td><td>:</td><td>";
			$isi.=$row->tindak_lanjut;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Rak</td><td>:</td><td>";
			$isi.=$row->no_rak;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No Baris</td><td>:</td><td>";
			$isi.=$row->no_baris;
			$isi.="</td></tr>";
			$isi.="</table>";
		 
		}
		
		$qry="select namafile from suratextra where nosurat=".$db->escape($this->input->get('isi'))." and urut not in (1,2);";
		$hasil1 =$db->query($qry);
			
		foreach ($hasil1->result() as $row1)
		{
			$isi.="<a href=\"#\" onClick=\"window.open('".
				$direktoriuplod.$row1->namafile."','inih','left='+Math.ceil(screen.width/2-500)+',top='+
				Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');\">".
				"<img src=\"".$direktoriuplod.$row1->namafile."\" width=\"170\" height=\"220\"></a>&nbsp;";
		}
		
		$data = array(
		    'name' => "btreport",
		    'id' => "btreport",
		    'value' => "DownloadReport",
		    'type' => "button",
		    'content' => "Download Report",
		    'onClick' => "window.open('suratmasukrepot?isi='+encodeURIComponent('".$this->input->get('isi')."'),'reportmasuk','left='+Math.ceil(screen.width/2-500)+',top='+
		Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');"
		);	
		$isi.="<center>".form_button($data)."&nbsp;&nbsp;";
		$data = array(
		    'name' => "btclose",
		    'id' => "btclose",
		    'value' => "DownloadReport",
		    'type' => "button",
		    'content' => "Close",
		    'onClick' => "window.close()"
		);
		
		$isi.=form_button($data)."</center>";
		echo $isi;
		$db->close();
		}
	}
}
?>