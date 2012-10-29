<?php
class lapsuratkeluaraxl extends CI_Controller {
	
	function index()
	{
		if ($this->session->userdata('yangmasuk'))
		{
		require_once 'Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);


		$styleThinBlackBorderOutline = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				)
			),
		);
		
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(1);
		$iniO=$objPHPExcel->getActiveSheet();
		$iniO->setTitle('Keterangan');
		$iniO
			->setCellValue('A1', 'Surat Keluar')
			->setCellValue('A2', 'Dicetak oleh.')
			->setCellValue('B2', $this->session->userdata('yangmasuk'))
			->setCellValue('A3', 'Tanggal Cetak')
			->setCellValue('B3', date('d/m/Y H:i:s'))
			->setCellValue('A4', "Periode" )
			->setCellValue('B4', $this->input->get('dari')." s/d. ".$this->input->get('ke'))
			;
		$iniO->getColumnDimension('A')->setWidth(15);
		$iniO->getColumnDimension('B')->setWidth(40);
		
		
		$objPHPExcel->setActiveSheetIndex(0);
		$iniO=$objPHPExcel->getActiveSheet();
		$iniO->setTitle('Laporan');
		
		$iniO
			->setCellValue('A1', 'No.')
			->setCellValue('B1', 'No. Surat')
			->setCellValue('C1', 'Tgl. Surat')
			->setCellValue('D1', 'Bagian / SUBDIN')
			->setCellValue('E1', 'Tujuan')
			->setCellValue('F1', 'Perihal')
			->setCellValue('G1', 'Keterangan')
			->setCellValue('H1', 'No. Berkas')
			->setCellValue('I1', 'No. Kendali')
			->setCellValue('J1', 'Kirim Ke')
			->setCellValue('K1', 'No. Rak')
			->setCellValue('L1', 'No. Baris')
			;
		$iniO->getStyle('A1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('B1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('C1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('D1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('E1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('F1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('G1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('H1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('I1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('J1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('K1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('L1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getColumnDimension('A')->setWidth(15);
		$iniO->getColumnDimension('B')->setWidth(25);
		$iniO->getColumnDimension('C')->setWidth(12);
		$iniO->getColumnDimension('D')->setWidth(25);
		$iniO->getColumnDimension('E')->setWidth(25);
		$iniO->getColumnDimension('F')->setWidth(25);
		$iniO->getColumnDimension('G')->setWidth(25);
		$iniO->getColumnDimension('H')->setWidth(17);
		$iniO->getColumnDimension('I')->setWidth(17);
		$iniO->getColumnDimension('J')->setWidth(40);
		$iniO->getColumnDimension('K')->setWidth(15);
		$iniO->getColumnDimension('L')->setWidth(15);
		$iniO->getStyle('A1:L1')->getFont()->setBold(true);
		$iniO->getStyle('A1:L1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$db=$this->db;
		$qry="select  a.nosurat,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv,
		a.dari,a.tujuan,a.keterangan,a.isi,
		a.no_berkas,b.no_rak,b.no_baris, 
		a.no_kendali,(select group_concat(userid SEPARATOR ', ') from keluar_ke where nosurat=a.nosurat) as kirimke 
		from keluar a left join keluar_dari b on a.nosurat=b.nosurat 
		where date(a.tanggal) between
		STR_TO_DATE('".$this->input->get('dari')."','%d/%m/%Y') and
		STR_TO_DATE('".$this->input->get('ke')."','%d/%m/%Y') order by a.nosurat;";
		
		
		$hasil =$db->query($qry);
		$baris=1;
		foreach ($hasil->result() as $row)
		{
			$baris++;
			$iniO
			->setCellValue("A".$baris, ($baris-1))
			->setCellValue("B".$baris, $row->nosurat)
			->setCellValue("C".$baris, $row->tanggalv)
			->setCellValue("D".$baris, $row->dari)
			->setCellValue("E".$baris, $row->tujuan)
			->setCellValue("F".$baris, $row->isi)
			->setCellValue("G".$baris, $row->keterangan)
			->setCellValue("H".$baris, $row->no_berkas)
			->setCellValue("I".$baris, $row->no_kendali)
			->setCellValue("J".$baris, $row->kirimke)
			->setCellValue("K".$baris, $row->no_rak)
			->setCellValue("L".$baris, $row->no_baris)
			;
			
			$iniO->getStyle("A".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("B".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("C".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("D".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("E".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("F".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("G".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("H".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("I".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("J".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("K".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("L".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			
			
			$iniO->getStyle("A".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("B".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("C".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("D".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("E".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("F".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("G".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("H".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("I".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("J".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("K".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("L".$baris)->applyFromArray($styleThinBlackBorderOutline);
		}
		$db->close();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="laporan.xls"');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		}
		exit;
	}
}
?>