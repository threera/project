<?php
require_once "../../exportExcel/vendor/autoload.php";
require_once "../../server/connect/connect.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'วันที่สั่งซื้อ');
$activeSheet->setCellValue('B1', 'เเบรนด์');
$activeSheet->setCellValue('C1', 'สินค้า');
$activeSheet->setCellValue('D1', 'รุ่น');
$activeSheet->setCellValue('E1', 'หมายเลขเครื่อง');
$activeSheet->setCellValue('F1', 'รับประกัน');
$activeSheet->setCellValue('G1', 'ร้านค้า');
$activeSheet->setCellValue('H1', 'ชื่อ-นามสกุล');
$activeSheet->setCellValue('I1', 'เบอร์โทร');
$activeSheet->setCellValue('J1', 'อีเมล');
$activeSheet->setCellValue('K1', 'เลขที่');
$activeSheet->setCellValue('L1', 'หมู่');
$activeSheet->setCellValue('M1', 'ซอย');
$activeSheet->setCellValue('N1', 'ถนน');
$activeSheet->setCellValue('O1', 'ตำบล');
$activeSheet->setCellValue('P1', 'อำเภอ');
$activeSheet->setCellValue('Q1', 'จังหวัด');
$activeSheet->setCellValue('R1', 'รหัสไปรษณีย์');


if (isset($_POST["checkbox_value"])) {

    $ids = implode("','", $_POST["checkbox_value"]);
    $query = $conn->query("SELECT * FROM register_sell  WHERE id IN ('" . $ids . "')");

    if ($query->num_rows > 0) {
        $i = 2;
        while ($row = $query->fetch_assoc()) {
            $activeSheet->setCellValue('A' . $i, $row['Purchase_date']);
            $activeSheet->setCellValue('B' . $i, $row['Brand']);
            $activeSheet->setCellValue('C' . $i, $row['Product']);
            $activeSheet->setCellValue('D' . $i, $row['Model']);
            $activeSheet->setCellValue('E' . $i, $row['SerialNumber']);
            $activeSheet->setCellValue('F' . $i, $row['Warranty']);
            $activeSheet->setCellValue('G' . $i, $row['Dealer']);
            $activeSheet->setCellValue('H' . $i, $row['Customer_name']);
            $activeSheet->setCellValue('I' . $i, $row['Tel']);
            $activeSheet->setCellValue('J' . $i, $row['Email']);
            $activeSheet->setCellValue('K' . $i, $row['Number']);
            $activeSheet->setCellValue('L' . $i, $row['Village']);
            $activeSheet->setCellValue('M' . $i, $row['Soi']);
            $activeSheet->setCellValue('N' . $i, $row['Road']);
            $activeSheet->setCellValue('O' . $i, $row['district']);
            $activeSheet->setCellValue('P' . $i, $row['amphure']);
            $activeSheet->setCellValue('Q' . $i, $row['province']);
            $activeSheet->setCellValue('R' . $i, $row['zipcode']);
            $i++;
        }
    }


    $filename =  date('d/m/Y') . '(ผู้ขาย.xlsx';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename=' . $filename);
    header('Cache-Control: max-age=0');
    $Excel_writer->save('php://output');
}
