<?php
 include('../../server/connect/connect.php');
if (!empty($_POST)) {

     $SerialNumber   = ($_POST['SerialNumber']);
     $Brand          = $_POST['Brand'];
     $Product        = ($_POST['Product']);
     $Model          = ($_POST['Model']);
     $Dealer         = $_POST['Dealer'];
     $Warranty         = $_POST['Warranty'];
     $Purchase_date  = $_POST['Purchase_date'];
     $Customer_name  = $_POST['Customer_name'];
     $Email          = $_POST['Email'];
     $Tel            = $_POST['Tel'];
     $Number         = $_POST['Number'];
     $Village        = $_POST['Village'];
     $Soi            = $_POST['Soi'];
     $Road           = $_POST['Road'];
     $province       = $_POST['province'];
     $amphure        = $_POST['amphure'];
     $district       = $_POST['district'];
     $zipcode        = $_POST['zipcode'];
     $Comment        = $_POST['Comment'];

     if ($_POST["employee_id"] != '') {
          $query = "  
           UPDATE register_sell  
           SET SerialNumber='$SerialNumber',
           Brand='$Brand',
           Product='$Product',
           Model='$Model',
           Dealer='$Dealer',
           Warranty='$Warranty',
           Purchase_date='$Purchase_date',
           Customer_name='$Customer_name',
           Email='$Email',
           Tel='$Tel',
           Number='$Number',
           Village='$Village',
           Soi='$Soi',
           Road='$Road',
           province='$province',
           amphure='$amphure',
           district='$district',
           zipcode='$zipcode',
           Comment='$Comment'
           WHERE id='" . $_POST["employee_id"] . "'";
          mysqli_query($conn, $query);
     }
}
