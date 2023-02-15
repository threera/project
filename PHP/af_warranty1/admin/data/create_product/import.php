<?php

//เเก้ไขวันที่ปัจจุบัน
date_default_timezone_set("Asia/Bangkok");
function date_edit($date_edit)
{
    $date_edit1 = str_replace('/', '-', $date_edit);
    return date('Y-m-d', strtotime($date_edit1 . "-543 years"));
}
$json_ret = array('success' => false);
$Status = 'FAIL';

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once('../../exportExcel/vendor/autoload.php');

$allowedFileType = [
    'application/vnd.ms-excel',
    'text/xls',
    'text/xlsx',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
];

if (in_array($_FILES["file"]["type"], $allowedFileType)) {

    $targetPath = 'uploads/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $Reader = new  PhpOffice\PhpSpreadsheet\Reader\Xlsx;

    $spreadSheet = $Reader->load($targetPath);
    $excelSheet = $spreadSheet->getActiveSheet();
    $spreadSheetAry = $excelSheet->toArray();
    $sheetCount = count($spreadSheetAry);


    $json_ret['data'] = array();

    $json_ret['sum'] = array();
    $sum = 0;
    $sus = 0;
    $ere = 0;

    for ($i = 1; $i < $sheetCount; $i++) {
        $Purchase_date = "";
        if (isset($spreadSheetAry[$i][0])) {
            $Purchase_date = date_edit(mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]));
            $Purchase_date1 = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
        } else {
            $Purchase_date = date('Y-m-d');
        }
        $Brand = "";
        if (isset($spreadSheetAry[$i][1])) {
            $Brand = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
        }
        $Product = "";
        if (isset($spreadSheetAry[$i][2])) {
            $Product = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
        }
        $Model = "";
        if (isset($spreadSheetAry[$i][3])) {
            $Model = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
        }
        $SerialNumber = "";
        if (isset($spreadSheetAry[$i][4])) {
            $SerialNumber = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
        }
        $Warranty = "";
        if (isset($spreadSheetAry[$i][5])) {
            $Warranty = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
        }
        $Dealer = "";
        if (isset($spreadSheetAry[$i][6])) {
            $Dealer = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
        }
        $Customer_name = "";
        if (isset($spreadSheetAry[$i][7])) {
            $Customer_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
        }
        $Tel = "";
        if (isset($spreadSheetAry[$i][8])) {
            $Tel = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
        }
        $Email = "";
        if (isset($spreadSheetAry[$i][9])) {
            $Email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
        }
        $Number = "";
        if (isset($spreadSheetAry[$i][10])) {
            $Number = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
        }
        $Village = "";
        if (isset($spreadSheetAry[$i][11])) {
            $Village = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
        }
        $Soi = "";
        if (isset($spreadSheetAry[$i][12])) {
            $Soi = mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
        }
        $Road = "";
        if (isset($spreadSheetAry[$i][13])) {
            $Road = mysqli_real_escape_string($conn, $spreadSheetAry[$i][13]);
        }
        $district = "";
        if (isset($spreadSheetAry[$i][14])) {
            $district = mysqli_real_escape_string($conn, $spreadSheetAry[$i][14]);
        }
        $amphure = "";
        if (isset($spreadSheetAry[$i][15])) {
            $amphure = mysqli_real_escape_string($conn, $spreadSheetAry[$i][15]);
        }
        $province = "";
        if (isset($spreadSheetAry[$i][16])) {
            $province = mysqli_real_escape_string($conn, $spreadSheetAry[$i][16]);
        }
        $zipcode = "";
        if (isset($spreadSheetAry[$i][17])) {
            $zipcode = mysqli_real_escape_string($conn, $spreadSheetAry[$i][17]);
        }

        $buy = "";
        if (isset($spreadSheetAry[$i][17])) {
            $buy = mysqli_real_escape_string($conn, $spreadSheetAry[$i][18]);
        }

        $sell = "";
        if (isset($spreadSheetAry[$i][17])) {
            $sell = mysqli_real_escape_string($conn, $spreadSheetAry[$i][19]);
        }
        $Register_date = date("Y-m-d H:i:s");

        $query_click = "SELECT SerialNumber FROM product where SerialNumber = '$SerialNumber'";
        $result_click  = mysqli_query($conn, $query_click);
        $row_click = mysqli_fetch_array($result_click);

        if ($row_click == 0 && strlen($SerialNumber) == 17) {
            $query = "insert into product(`Purchase_date`,`Brand`,`Product`,`Model`,`SerialNumber`,
                `Warranty`, `Dealer`, `Customer_name`,`Tel`, `Email`, `Number`, `Village`, `Soi`, `Road`, `district`, 
                `amphure`, `province`, `zipcode`,`Register_date`)
                values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssssssssssssssssss";
            $paramArray = array(
                $Purchase_date,
                $Brand,
                $Product,
                $Model,
                $SerialNumber,
                $Warranty,
                $Dealer,
                $Customer_name,
                $Tel,
                $Email,
                $Number,
                $Village,
                $Soi,
                $Road,
                $district,
                $amphure,
                $province,
                $zipcode,
                $Register_date
            );
            $insertId = $db->insert($query, $paramType, $paramArray);

            if (!empty($insertId)) {
                if ($buy == 'y') {
                    $query_buy = "insert into register_buy(`Purchase_date`,`Brand`,`Product`,`Model`,`SerialNumber`,
                `Warranty`, `Dealer`, `Customer_name`,`Tel`, `Email`, `Number`, `Village`, `Soi`, `Road`, `district`, 
                `amphure`, `province`, `zipcode`,`Register_date`)
                values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $paramType_buy = "sssssssssssssssssss";
                    $paramArray_buy = array(
                        $Purchase_date,
                        $Brand,
                        $Product,
                        $Model,
                        $SerialNumber,
                        $Warranty,
                        $Dealer,
                        $Customer_name,
                        $Tel,
                        $Email,
                        $Number,
                        $Village,
                        $Soi,
                        $Road,
                        $district,
                        $amphure,
                        $province,
                        $zipcode,
                        $Register_date
                    );
                    $insertId_buy = $db->insert($query_buy, $paramType_buy, $paramArray_buy);
                }

                if ($sell == 'y') {
                    $query_sell = "insert into register_sell(`Purchase_date`,`Brand`,`Product`,`Model`,`SerialNumber`,
                `Warranty`, `Dealer`, `Customer_name`,`Tel`, `Email`, `Number`, `Village`, `Soi`, `Road`, `district`, 
                `amphure`, `province`, `zipcode`,`Register_date`)
                values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $paramType_sell = "sssssssssssssssssss";
                    $paramArray_sell = array(
                        $Purchase_date,
                        $Brand,
                        $Product,
                        $Model,
                        $SerialNumber,
                        $Warranty,
                        $Dealer,
                        $Customer_name,
                        $Tel,
                        $Email,
                        $Number,
                        $Village,
                        $Soi,
                        $Road,
                        $district,
                        $amphure,
                        $province,
                        $zipcode,
                        $Register_date
                    );
                    $insertId_sell = $db->insert($query_sell, $paramType_sell, $paramArray_sell);
                }
                $sus++;
                $Status = 'SUCCESS';
                $json_ret['success'] = true;
            } else {
                $Status = 'FAIL';
            }
        } else {
            $Status = 'FAIL';
        }
        $sum++;
        array_push($json_ret['data'], [$SerialNumber, $Status,$buy]);
    }
}

$ere = $sum - $sus;
array_push($json_ret['sum'], $sum, $sus, $ere);

echo json_encode($json_ret);
mysqli_close($conn);
