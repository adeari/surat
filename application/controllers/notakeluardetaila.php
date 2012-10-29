<?php
class notakeluardetaila extends CI_Controller {
	function kirimke($ini)
	{
		$db=$this->db;
		$balik="";
		$qry="select b.nama from nota_keluar_ke a inner join master_user b on a.userid=b.userid  where a.nonota=".$db->escape($ini).";";
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
		$this->load->model('notakeluarisimodel');
		$this->notakeluarisimodel->isigambardulu($this->input->get('isi'));
		
		$qry="select a.nonota,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv,DATE_FORMAT(a.tgl_pengiriman, '%d/%m/%Y') as  tgl_pengirimanv, 
		a.tujuan,a.keterangan, a.perihal, 
		a.sifat,b.no_rak,b.no_baris from nota_keluar  a left join nota_keluar_dari b on a.nonota=b.nonota 
		where a.nonota=".$db->escape($this->input->get('isi')).";";
		
		$hasil =$db->query($qry);
		$isi="";
		foreach ($hasil->result() as $row)
		{
			$isi.="<table>";
			$isi.="<tr><td colspan=\"3\" align=\"center\">Nota Keluar</td>";
			$isi.="<td rowspan=\"12\" valign=\"midle\"  width=\"30%\">";
			$qry="select namafile from notakeluarextra where nonota=".$db->escape($this->input->get('isi'))." and urut in (1,2);";
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
			$isi.="<tr valign=\"top\" width=\"14%\"><td>No. Nota</td><td width=\"1%\">:</td><td width=\"55%\">";
			$isi.=$row->nonota;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Nota</td><td>:</td><td>";
			$isi.=$row->tanggalv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Pengiriman</td><td>:</td><td>";
			$isi.=$row->tgl_pengirimanv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Perihal</td><td>:</td><td>";
			$isi.=$row->perihal;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tujuan</td><td>:</td><td>";
			$isi.=$row->tujuan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Kirim ke</td><td>:</td><td>";
			$isi.= $this->kirimke($row->nonota);
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Keterangan</td><td>:</td><td>";
			$isi.=$row->keterangan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Sifat Surat</td><td>:</td><td>";
			$isi.=$row->sifat;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Rak</td><td>:</td><td>";
			$isi.=$row->no_rak;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Baris</td><td>:</td><td>";
			$isi.=$row->no_baris;
			$isi.="</td></tr>";
			$isi.="</table>";
		}
		
		$qry="select namafile from notakeluarextra where nonota=".$db->escape($this->input->get('isi'))." and urut not in (1,2);";
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
		    'onClick' => "window.open('notakeluarrepot?isi='+encodeURIComponent('".$this->input->get('isi')."'),'reportmasuk','left='+Math.ceil(screen.width/2-500)+',top='+
		Math.ceil(screen.height/2-300)+',menubar=1,scrollbars=1,resizable=1,width=1000,height=600');"
		);
		$isi.="<center>".form_button($data)."&nbsp;&nbsp;";
		$data = array(
		    'name' => "btclose",
		    'id' => "btclose",
		    'value' => "CloseReport",
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