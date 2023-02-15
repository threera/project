<?php
include('../../../server/connect/connect.php');
$sql = "SELECT * FROM districts  WHERE 	name_th= '{$_GET['id']}' ";
$query = mysqli_query($conn, $sql);
$row_provinces = mysqli_fetch_array($query);
$provinces = $row_provinces["id"];

$sql = "SELECT * FROM districts WHERE id=$provinces";
$query = mysqli_query($conn, $sql);
 
$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);