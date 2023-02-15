<?php
 include('../../server/connect/connect.php');

$id_status = $_POST['employee_id'];
$status_level = $_POST['status_level'];

if ($status_level == 1) {
    $sql_product = "UPDATE `product` SET `Status` = 1 WHERE SerialNumber =  '$id_status'";
    $result_product = $conn->query($sql_product);

    $sql_buy = "UPDATE `register_buy` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_buy = $conn->query($sql_buy);

    $sql_sell = "UPDATE `register_sell` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_sell = $conn->query($sql_sell);
} elseif ($status_level == 2) {

    $sql_product = "UPDATE `product` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_product = $conn->query($sql_product);

    $sql_buy = "UPDATE `register_buy` SET `Status` = 1 WHERE SerialNumber =  '$id_status'";
    $result_buy = $conn->query($sql_buy);

    $sql_sell = "UPDATE `register_sell` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_sell = $conn->query($sql_sell);
} elseif ($status_level == 3) {
    $sql_product = "UPDATE `product` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_product = $conn->query($sql_product);

    $sql_buy = "UPDATE `register_buy` SET `Status` = 0 WHERE SerialNumber =  '$id_status'";
    $result_buy = $conn->query($sql_buy);

    $sql_sell = "UPDATE `register_sell` SET `Status` = 1 WHERE SerialNumber =  '$id_status'";
    $result_sell = $conn->query($sql_sell);
} else {
}
