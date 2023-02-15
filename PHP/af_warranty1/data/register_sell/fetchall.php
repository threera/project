<?php
include('../../server/connect/connect.php');

//เเยกตัวเลขออกจากตัวหนังสือ
function extract_int($str)
{
  $str = str_replace(",", "", $str);
  preg_match('/[[:digit:]]+\.?[[:digit:]]*/', $str, $regs);
  return (doubleval($regs[0]));
}

$json_ret = array('success' => false);
$Status = 'FAIL';

if ($_POST["SerialNumber"] != '') {
  //แปลงตัวใหญ่
  $SerialNumber  = strtoupper($_POST['SerialNumber']);

  $query = "SELECT SerialNumber,Brand,Product,Model,Warranty,Dealer FROM product WHERE 	SerialNumber = '$SerialNumber' ";

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  if ($row) {
    $json_ret['data'] = $row;
    $json_ret['success'] = true;
  }
} else {
  //แปลงตัวใหญ่
  $SerialNumber_Start   = strtoupper($_POST['SerialNumber_Start']);
  $SerialNumber_End  = strtoupper($_POST['SerialNumber_End']);

  //เเยกตัวอักษร
  $SerialNumber_Start = extract_int($SerialNumber_Start);
  $SerialNumber_End = extract_int($SerialNumber_End);

  $json_ret['data'] = array();
  for ($i = $SerialNumber_Start; $i <= $SerialNumber_End; $i++) {

    $number_SN = str_pad($i, 14, 0, STR_PAD_LEFT);
    $SerialNumber_Chang = "ASP$number_SN";
    $query = "SELECT * FROM product WHERE SerialNumber = '$SerialNumber_Chang' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row == null) {
      $Status = 'FAIL';
    } else {
      $json_ret['data'] = $row;
      $Status = 'SUCCESS';
      $json_ret['success'] = true;
      break;
    }
  }
}

echo json_encode($json_ret);
mysqli_close($conn);
