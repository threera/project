<?php  
 include('../../server/connect/connect.php');
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM product WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }  
 ?>