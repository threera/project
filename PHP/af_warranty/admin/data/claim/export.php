<?php
require_once "../../exportExcel/vendor/autoload.php";
require_once "../../server/connect/connect.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'หมายเลขเครื่อง');
$activeSheet->setCellValue('B1', 'วันที่เเจ้ง');
$activeSheet->setCellValue('C1', 'ชื่อ-นามสกุล');
$activeSheet->setCellValue('D1', 'อีเมล');
$activeSheet->setCellValue('E1', 'เบอร์โทร');


$query = $conn->query("SELECT * FROM claim");

if ($query->num_rows > 0) {
    $i = 2;
    while ($row = $query->fetch_assoc()) {
        $activeSheet->setCellValue('A' . $i, $row['SerialNumber']);
        $activeSheet->setCellValue('B' . $i, $row['Register_date']);
        $activeSheet->setCellValue('C' . $i, $row['Fullname']);
        $activeSheet->setCellValue('D' . $i, $row['Email']);
        $activeSheet->setCellValue('E' . $i, $row['Mobile']);
        $i++;
    }
}

$filename =  date('d/m/Y') . 'claim.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
