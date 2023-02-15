<?php
include('server/connect/connect.php');
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>REGISTER SELL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include 'components/link/header.php'; ?>

</head>

<body>
  <?php

  //======= Header ======= 
  include 'components/tab/header.php';
  // <!-- End Header -->

  //<!-- End Hero -->
  include 'components/tab/hero.php';
  ?>

  <main id="main">
    <!-- ======= form ======= -->
    <?php include 'components/form/register/form_sell.php';
    // <!-- ======= alert ======= -->
    include 'components/alerts/alerts.php'; ?>


  </main><!-- End #main -->

  <?php
  //<!-- ======= Footer ======= -->
  include 'components/tab/footer.php';
  //<!-- End Footer -->
  //  <!-- ======= modal form ======= -->
  include 'components/form/modal/inputmodal.php';
  ?>

  <?php include 'components/link/footer.php'; ?>
  <script src="data/register_sell/insert.js"></script>

</body>

</html>