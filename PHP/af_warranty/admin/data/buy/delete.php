<?php
//fetch.php  
include('../../server/connect/connect.php');
if (isset($_POST["checkbox_value"])) {
     for ($count = 0; $count < count($_POST["checkbox_value"]); $count++) {
          $query = "DELETE FROM register_buy WHERE id = '" . $_POST['checkbox_value'][$count] . "'";
          mysqli_query($conn, $query);
     }
}
