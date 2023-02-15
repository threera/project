<?php
include('../../../server/connect/connect.php');
$sql = "SELECT * FROM amphures  WHERE name_th= '{$_GET['amphure_id']}' ";
$query = mysqli_query($conn, $sql);
$row_amphures = mysqli_fetch_array($query);
$amphures = $row_amphures["id"];

$sql = "SELECT * FROM districts WHERE amphure_id=$amphures";
$query = mysqli_query($conn, $sql);
 
$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);