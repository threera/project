<?php

include('../../server/connect/connect.php');
$SerialNumber   = strtoupper($_POST['SerialNumber']);
$Fullname      = $_POST['Fullname'];
$Email          = $_POST['Email'];
$Mobile         = $_POST['Mobile'];
$Cause         = $_POST['Cause'];
$Register_date  = date('Y-m-d H:i:s');


$sql = "INSERT INTO `claim`( `Register_date`,`SerialNumber`,`Fullname`,`Email`, `Mobile`,`Cause`) 
	VALUES ('$Register_date','$SerialNumber','$Fullname','$Email','$Mobile','$Cause')";
mysqli_query($conn, $sql);
mysqli_close($conn);
$json_ret['success'] = $sql;
echo json_encode($json_ret);
