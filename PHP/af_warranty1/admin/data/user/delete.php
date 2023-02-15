<?php
//fetch.php  
include('../../server/connect/connect.php');
if (isset($_POST["employee_id"])) {
     $query = "DELETE FROM users WHERE id = '" . $_POST["employee_id"] . "'";
     $result = mysqli_query($conn, $query);
}
