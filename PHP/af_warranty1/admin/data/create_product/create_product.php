<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include('../../server/connect/connect.php');

$json_ret = array('success' => false);
$Status = 'FAIL';

$SerialNumber       = strtoupper($_POST['SerialNumber']);
$SerialNumber_Start = strtoupper($_POST['SerialNumber_Start']);
$SerialNumber_End   = strtoupper($_POST['SerialNumber_End']);
$Model              = strtoupper($_POST['Model']);
$Brand              = $_POST['Brand'];
$Product            = $_POST['Product'];
$Warranty           = $_POST['Warranty'];
$Dealer             = $_POST['Dealer'];
$Customer_name      = $_POST['Customer_name'];
$Email              = $_POST['Email'];
$Tel                = $_POST['Tel'];
$Number             = $_POST['Number'];
$Village            = $_POST['Village'];
$Soi                = $_POST['Soi'];
$Road               = $_POST['Road'];
$province           = $_POST['province'];
$amphure            = $_POST['amphure'];
$district           = $_POST['district'];
$zipcode            = $_POST['zipcode'];

$Customer           = $_POST['Customer'];
$Sell               = $_POST['Sell'];


if ($_POST['Purchase_date']) {
    $Purchase_date      = $_POST['Purchase_date'];
} else {
    $Purchase_date      = date("Y-m-d");
}
$Register_date = date("Y-m-d H:i:s");
$Comment  = $_POST['Comment'];

$json_ret['data'] = array();

$json_ret['sum'] = array();
$sum = 0;
$sus = 0;
$ere = 0;

//เเยกตัวเลขตัวหนังสือ
//ตัวเเรก
$cutstr_start = substr($SerialNumber_Start, 0, 6); //ข้างหน้า
$cutstr_end = substr($SerialNumber_Start, -11, 17); //ข้างหลัง

//ตัวสอง
$cutstr_start1 = substr($SerialNumber_End, 0, 6); //ข้างหน้า
$cutstr1_end = substr($SerialNumber_End, -11, 17); //ข้างหลัง

function strAll($str_s, $str_e)
{
    //เก็บข้อมูลที่เเยกออกเป็น array
    $ar = array();
    $arAll = array();
    for ($i = $str_s; $i <= $str_e; $i++) {
        array_push($ar, $i);
    }

    // เช็คเลขว่าเรียงกันไม
    if ($ar !== []) {
        $last = $ar[0];
        for ($i = 1; $i < sizeof($ar); $i++) {
            if ($ar[$i] != $last + 1)
                return false;
            $last = $ar[$i];
        }
        return true;
    } else {
        return false;
    }
}

if ($SerialNumber_Start != "" && $SerialNumber_End != "") {
    if (strAll($cutstr_end, $cutstr1_end) == true) {
        for ($i = $cutstr_end; $i <= $cutstr1_end; $i++) {
            $SerialNumber_chang = $cutstr_start . $i;
            $query_click = "SELECT SerialNumber FROM product where SerialNumber = '$SerialNumber_chang'";
            $result_click  = mysqli_query($conn, $query_click);
            $row_click = mysqli_fetch_array($result_click);

            if ($row_click == 0) {
                $sql = "INSERT INTO `product`(`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
                VALUES ('$Purchase_date','$Register_date','$SerialNumber_chang','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    if ($Customer == 'on') {
                        $sql_register_buy = "INSERT INTO `register_buy` (`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
                        VALUES ('$Purchase_date','$Register_date','$SerialNumber_chang','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
                        $query_register_buy = mysqli_query($conn, $sql_register_buy);
                    }
                    if ($Sell == 'on') {
                        $sql_register_sell = "INSERT INTO `register_sell` (`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
                    VALUES ('$Purchase_date','$Register_date','$SerialNumber_chang','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
                        $query_register_sell = mysqli_query($conn, $sql_register_sell);
                    }
                    $sus++;
                    $Status = 'SUCCESS';
                    $json_ret['success'] = true;
                } else {
                    $Status = 'FAIL';
                }
            }
            $sum++;
            array_push($json_ret['data'], [$SerialNumber_chang, $Status]);
        }
    } else {
        $json_ret['success'] = 'Sort';
    }
} else {
    $query_click = "SELECT SerialNumber FROM product where SerialNumber = '$SerialNumber'";
    $result_click  = mysqli_query($conn, $query_click);
    $row_click = mysqli_fetch_array($result_click);
    if ($row_click == 0) {
        $sql = "INSERT INTO `product` (`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
        VALUES ('$Purchase_date','$Register_date','$SerialNumber','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            if ($Customer == 'on') {
                $sql_register_buy = "INSERT INTO `register_buy` (`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
                VALUES ('$Purchase_date','$Register_date','$SerialNumber','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
                $query_register_buy = mysqli_query($conn, $sql_register_buy);
            }
            if ($Sell == 'on') {
                $sql_register_sell = "INSERT INTO `register_sell` (`Purchase_date`,`Register_date`,`SerialNumber`,`Brand`,`Product`,`Model`, `Warranty`, `Dealer`, `Customer_name`,`Email`, `Tel`, `Number`, `Village`, `Soi`, `Road`, `province`, `amphure`, `district`, `zipcode`, `Comment`) 
            VALUES ('$Purchase_date','$Register_date','$SerialNumber','$Brand','$Product','$Model','$Warranty','$Dealer','$Customer_name','$Email','$Tel','$Number','$Village','$Soi','$Road','$province','$amphure','$district','$zipcode','$Comment')";
                $query_register_sell = mysqli_query($conn, $sql_register_sell);
            }
            $sus++;
            $Status = 'SUCCESS';
            $json_ret['success'] = true;
        }
    }
    $sum++;
    array_push($json_ret['data'], [$SerialNumber, $Status]);
}

$ere = $sum - $sus;
array_push($json_ret['sum'], $sum, $sus, $ere);
echo json_encode($json_ret);
mysqli_close($conn);
