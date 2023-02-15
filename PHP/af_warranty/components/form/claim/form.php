<section id="claim" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title col-md-6 mx-auto" style="text-align: start;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <h2 class="text-center">เเจ้งเคลม</h2>
      <div class="row">
        <div class="col-lg-12">
          <form id="claim_form" class="row needs-validation" novalidate method="post">
            <div class="col-lg-12 m-0 position-relative">
              <label for="SerialNumber" class="form-label col-12">หมายเลขเครื่อง (Serial Number)*</label>
              <input type="text" class="form-control mb-2 " name="SerialNumber" id="SerialNumber" minlength="17" maxlength="17" required placeholder="ASP02065010000001">
              <i type="button" class="bi bi-question-circle position-absolute top-30 start-100" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
              <div class="invalid-feedback mb-2">
                กรุณากรอก หมายเลขเครื่อง
              </div>
            </div>
            <div class="col-lg-12 mt-2">
              <label for="Fullname" class="form-label">ชื่อ-นามสกุล (Customer Name)*</label>
              <input type="text" class="form-control" name="Fullname" id="Fullname" required>
              <div class="invalid-feedback">
                กรุณากรอก ชื่อ-นามสกุล
              </div>
            </div>
            <div class="col-lg-6 mt-2">
              <label for="Mobile" class="form-label">เบอร์โทร (Tel.)*</label>
              <input type="text" class="form-control" name="Mobile" id="Mobile" required>
              <div class="invalid-feedback">
                กรุณากรอก เบอร์โทร
              </div>
            </div>
            <div class="col-lg-6 mt-2">
              <label for="Email" class="form-label">อีเมล (Email)</label>
              <input type="email" class="form-control" name="Email" id="Email">
            </div>
            <div class="col-lg-12 mt-2">
              <label for="Cause" class="form-label">สาเหตุ (Cause)</label>
              <textarea type="text" class="form-control" name="Cause" id="Cause"></textarea>
            </div>
            <div class="col-12 text-center mt-4 fo-button">
              <button type="submit" class="btn btn-primary px-5 py-3" id="claim_form">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Team Section -->