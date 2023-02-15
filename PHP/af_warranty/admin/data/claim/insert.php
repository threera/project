<?php
 include('../../server/connect/connect.php');
if (!empty($_POST)) {

     $SerialNumber   = ($_POST['SerialNumber']);
     $Fullname       = $_POST['Fullname'];
     $Email          = $_POST['Email'];
     $Mobile         = $_POST['Mobile'];
     $Cause          = $_POST['Cause'];
     $Status          = $_POST['Status'];

     if ($_POST["employee_id"] != '') {
          $query = "  
           UPDATE claim   
           SET SerialNumber='$SerialNumber',
           Fullname='$Fullname',
           Email='$Email',
           Mobile='$Mobile',
           Cause='$Cause'
           WHERE id='" . $_POST["employee_id"] . "'";
          mysqli_query($conn, $query);
     }
}
