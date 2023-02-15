<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<section id="hero" class="d-flex align-items-center row">
  <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
    <h1><?= ($activePage == 'index' || $activePage == 'customer' || $activePage == 'dealer') ? 'ลงทะเบียนการรับประกัน' : ($activePage == 'check' ? 'ตรวจสอบการรับประกัน' : 'แจ้งเคลม'); ?></h1>
    <h2><?= ($activePage == 'index' || $activePage == 'customer' || $activePage == 'dealer') ? 'ลงทะเบียนผลิตภัณฑ์เพื่อรับสิทธิประโยชน์สำหรับผลิตภัณฑ์ของคุณ' : ($activePage == 'check' ? 'ตรวจสอบสถานะและระยะเวลาการรับประกัน' : 'แจ้งปัญหาผลิตภัณฑ์โดยกรอกเเบบฟอร์มเพื่อส่งเรื่องเคลม'); ?></h2>
    <div class="text-ma d-flex justify-content-center justify-content-lg-start">
      <a href="#team" class="btn-get-started scrollto <?= ($activePage == 'index' || $activePage == 'register-buy' || $activePage == 'register-sell') ? '' : ($activePage == 'check' ? 'd-none' : 'd-none'); ?>">ลงทะเบียน</a>
      <a class="btn-watch-video"><i class="bi bi-shield-check"></i></i></a>
      <a class="btn-watch-video"><i class="bi bi-card-list"></i></i></i></a>
      <a class="btn-watch-video"><i class="bi bi-wrench"></i></i></i></a>
    </div>
  </div>
  <div class="col-lg-6 hero-img order-1 order-lg-2 p-0" data-aos="zoom-in" data-aos-delay="200">
    <img src="<?= ($activePage == 'index' || $activePage == 'customer' || $activePage == 'dealer') ? 'assets/img/TEST-01.png' : ($activePage == 'check' ? 'assets/img/TEST-02.png' : 'assets/img/TEST-03.png'); ?>" alt="">
  </div>
</section>