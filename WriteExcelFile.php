<?php
/** Include PHPExcel library */
require_once 'libs/PHPExcel.php';
require_once 'libs/PHPExcel/IOFactory.php';

$objPHPExcel = PHPExcel_IOFactory::load("file.xlsx");
$objPHPExcel->setActiveSheetIndex(0);
$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;

//echo $row;
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, 'ha');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, 'ha');

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('file.xlsx');
