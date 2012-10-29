<?php
class lapsuratkeluarxl extends CI_Controller {
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
			->setCellValue('C1', 'Tanggal')
			->setCellValue('D1', 'Tujuan')
			->setCellValue('E1', 'Perihal')
			->setCellValue('F1', 'Keterangan')
			->setCellValue('G1', 'Bagian / SUBDIN')
			->setCellValue('H1', 'No. Berkas')
			->setCellValue('I1', 'No. Kendali')
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
		$iniO->getColumnDimension('A')->setWidth(15);
		$iniO->getColumnDimension('B')->setWidth(20);
		$iniO->getColumnDimension('C')->setWidth(12);
		$iniO->getColumnDimension('D')->setWidth(25);
		$iniO->getColumnDimension('E')->setWidth(35);
		$iniO->getColumnDimension('F')->setWidth(35);
		$iniO->getColumnDimension('G')->setWidth(25);
		$iniO->getColumnDimension('H')->setWidth(15);
		$iniO->getColumnDimension('I')->setWidth(15);
		$iniO->getStyle('A1:I1')->getFont()->setBold(true);
		$iniO->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		
		$qry="select  nosurat,DATE_FORMAT(tanggal, '%d/%m/%Y') as  tanggalv
		,dari,tujuan,keterangan,isi,no_berkas,
		no_kendali from keluar
		where
		date(tanggal) between
		STR_TO_DATE('".$this->input->get('dari')."','%d/%m/%Y') and
		STR_TO_DATE('".$this->input->get('ke')."','%d/%m/%Y') order by nosurat;";
		
		$db=$this->db;
		$hasil =$db->query($qry);
		$baris=1;
		foreach ($hasil->result() as $row)
		{
			$baris++;
			$iniO
			->setCellValue("A".$baris, ($baris-1))
			->setCellValue("B".$baris, $row->nosurat)
			->setCellValue("C".$baris, $row->tanggalv)
			->setCellValue("D".$baris, $row->tujuan)
			->setCellValue("E".$baris, $row->isi)
			->setCellValue("F".$baris, $row->keterangan)
			->setCellValue("G".$baris, $row->dari)
			->setCellValue("H".$baris, $row->no_berkas)
			->setCellValue("I".$baris, $row->no_kendali)
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
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("I".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
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