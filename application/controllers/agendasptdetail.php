<?php
class agendasptdetail extends CI_Controller {
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		$db=$this->db;
		$direktoriuplod="gambaruplod/";
		$this->load->model('agendasptisimodel');
		$this->agendasptisimodel->isigambardulu($this->input->get('isi'));
		$qry="select a.noagenda,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv 
		,a.dari,a.tujuan,a.keterangan,a.isi,a.no_berkas,b.no_rak,b.no_baris,  
		a.no_kendali from agendaspt a left join agendaspt_dari b on a.noagenda=b.noagenda 
		where a.noagenda=".$db->escape($this->input->get('isi')).";";
		$hasil =$db->query($qry);
		$isi="";
		foreach ($hasil->result() as $row)
		{
			$isi.="<table>";
			$isi.="<tr><td colspan=\"3\" align=\"center\">Agenda SPT</td>";
			$isi.="<td rowspan=\"13\" valign=\"midle\"  width=\"30%\">";
			$qry="select namafile from agendasptextra where noagenda=".$db->escape($this->input->get('isi'))." and urut in (1,2);";
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
			$isi.="<tr valign=\"top\" width=\"14%\"><td>No. Agenda</td><td width=\"1%\">:</td><td width=\"55%\">";
			$isi.=$row->noagenda;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tanggal Agenda</td><td>:</td><td>";
			$isi.=$row->tanggalv;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Perihal</td><td>:</td><td>";
			$isi.=$row->keterangan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Bagian / SUBDIN</td><td>:</td><td>";
			$isi.=$row->dari;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Tujuan</td><td>:</td><td>";
			$isi.=$row->tujuan;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>Keterangan</td><td>:</td><td>";
			$isi.=$row->isi;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No Berkas</td><td>:</td><td>";
			$isi.=$row->no_berkas;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Kendali</td><td>:</td><td>";
			$isi.=$row->no_kendali;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Rak</td><td>:</td><td>";
			$isi.=$row->no_rak;
			$isi.="</td></tr>";
			$isi.="<tr valign=\"top\"><td>No. Baris</td><td>:</td><td>";
			$isi.=$row->no_baris;
			$isi.="</td></tr>";
			$isi.="</table>";
		}
		
		$qry="select namafile from agendasptextra where noagenda=".$db->escape($this->input->get('isi'))." and urut not in (1,2);";
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
		    'onClick' => "window.open('agendasptrepot?isi='+encodeURIComponent('".$this->input->get('isi')."'),'reportmasuk','left='+Math.ceil(screen.width/2-500)+',top='+
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