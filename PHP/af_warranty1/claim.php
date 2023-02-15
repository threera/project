<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CLAIM</title>
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
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Team Section ======= -->
    <?php include 'components/form/claim/form.php';

    include 'components/alerts/alertsclaim.php'; ?>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php

  include 'components/tab/footer.php';
  //  <!-- ======= modal form ======= -->
  include 'components/form/modal/inputmodal.php';
  ?>

  <!-- End Footer -->

  <?php include 'components/link/footer.php'; ?>
  <script src="data/claim/insert.js"></script>

</body>

</html>