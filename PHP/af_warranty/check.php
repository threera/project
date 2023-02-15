<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CHECK</title>
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
    <section id="check" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title mx-auto" style="text-align: start;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
          <h2 class="text-center">ตรวจสอบการรับประกัน</h2>

          <div class="row">

            <div class="col-lg-12">
              <?php include 'components/form/check/form.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main -->

  <?php

  include 'components/tab/footer.php';
  //  <!-- ======= modal form ======= -->
  include 'components/form/modal/inputmodal.php';
  ?>

  <?php include 'components/link/footer.php'; ?>
  <script src="data/check/check.js"></script>

</body>

</html>