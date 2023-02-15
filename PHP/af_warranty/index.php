<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>WARRANTY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include 'components/link/header.php'; ?>


</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'components/tab/header.php' ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php include 'components/tab/hero.php'; ?>

  <main id="main">

    <?php

    //<!-- ======= เลือกการลงทะเบียน ======= -->
    include 'components/home/select_register.php';
    // <!-- ======= เงื่อนไขการรับประกัน ======= -->
    include 'components/home/warranty_terms.php';

    ?>

  </main>

  <!-- ======= Footer ======= -->
  <?php include 'components/tab/footer.php'; ?>

  <!-- Vendor JS Files -->
  <?php include 'components/link/footer.php'; ?>

</body>

</html>