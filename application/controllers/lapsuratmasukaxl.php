<?php
class lapsuratmasukaxl extends CI_Controller {
	
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
			->setCellValue('A1', 'Surat Masuk')
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
			->setCellValue('D1', 'Tgl. Masuk')
			->setCellValue('E1', 'Dari')
			->setCellValue('F1', 'Tujuan')
			->setCellValue('G1', 'Sifat Surat')
			->setCellValue('H1', 'Perihal')
			->setCellValue('I1', 'Keterangan')
			->setCellValue('J1', 'Disposisi')
			->setCellValue('K1', 'Tgl. Disposisi')
			->setCellValue('L1', 'Tindak Lanjut')
			->setCellValue('M1', 'No. Berkas')
			->setCellValue('N1', 'No. Kendali')
			->setCellValue('O1', 'Kirim Ke')
			->setCellValue('P1', 'No. Rak')
			->setCellValue('Q1', 'No. Baris')
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
		$iniO->getStyle('M1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('N1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('O1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('P1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getStyle('Q1')->applyFromArray($styleThinBlackBorderOutline);
		$iniO->getColumnDimension('A')->setWidth(15);
		$iniO->getColumnDimension('B')->setWidth(20);
		$iniO->getColumnDimension('C')->setWidth(12);
		$iniO->getColumnDimension('D')->setWidth(12);
		$iniO->getColumnDimension('E')->setWidth(25);
		$iniO->getColumnDimension('F')->setWidth(25);
		$iniO->getColumnDimension('G')->setWidth(20);
		$iniO->getColumnDimension('H')->setWidth(35);
		$iniO->getColumnDimension('I')->setWidth(35);
		$iniO->getColumnDimension('J')->setWidth(20);
		$iniO->getColumnDimension('K')->setWidth(14);
		$iniO->getColumnDimension('L')->setWidth(25);
		$iniO->getColumnDimension('M')->setWidth(20);
		$iniO->getColumnDimension('N')->setWidth(20);
		$iniO->getColumnDimension('O')->setWidth(40);
		$iniO->getColumnDimension('P')->setWidth(15);
		$iniO->getColumnDimension('Q')->setWidth(15);
		$iniO->getStyle('A1:Q1')->getFont()->setBold(true);
		$iniO->getStyle('A1:Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$db=$this->db;
		$qry="select  a.nosurat,DATE_FORMAT(a.tanggal, '%d/%m/%Y') as  tanggalv,DATE_FORMAT(a.tgl_masuk, '%d/%m/%Y') as  tgl_masukv
		,a.dari,a.tujuan,a.keterangan,a.sifat_surat,a.isi,a.disposisi,DATE_FORMAT(a.tgl_disposisi, '%d/%m/%Y') as  tgl_disposisiv,
		a.no_berkas,c.no_rak,c.no_baris, 
		a.no_kendali,a.tindak_lanjut,(select group_concat(userid SEPARATOR ', ') from masuk_ke where nosurat=a.nosurat) as kirimke 
		from masuk a left join masuk_dari c on a.nosurat=c.nosurat 
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
			->setCellValue("D".$baris,  $row->tgl_masukv)
			->setCellValue("E".$baris, $row->dari)
			->setCellValue("F".$baris, $row->tujuan)
			->setCellValue("G".$baris, $row->sifat_surat)
			->setCellValue("H".$baris, $row->isi)
			->setCellValue("I".$baris, $row->keterangan)
			->setCellValue("J".$baris, $row->disposisi)
			->setCellValue("K".$baris, $row->tgl_disposisiv)
			->setCellValue("L".$baris, $row->tindak_lanjut)
			->setCellValue("M".$baris, $row->no_berkas)
			->setCellValue("N".$baris, $row->no_kendali)
			->setCellValue("O".$baris, $row->kirimke)
			->setCellValue("P".$baris, $row->no_rak)
			->setCellValue("Q".$baris, $row->no_baris)
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
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
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
			$iniO->getStyle("J".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("K".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("L".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("M".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("N".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("O".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("P".$baris)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$iniO->getStyle("Q".$baris)->getAlignment()
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
			$iniO->getStyle("M".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("N".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("O".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("P".$baris)->applyFromArray($styleThinBlackBorderOutline);
			$iniO->getStyle("Q".$baris)->applyFromArray($styleThinBlackBorderOutline);
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