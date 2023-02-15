<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title mx-auto" style="text-align: start;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <h2 class="text-center">ผู้ขาย</h2>
      <div class="row">
        <div class="col-lg-12">
          <form id="register_sell" method="POST" class="row  g-3 needs-validation" novalidate>
            <span class="title">ผลิตภัณฑ์ (Product)</span>
            <hr>
            <div class="col-lg-6 col-md-12 col-sm-12 m-0 position-relative" id="SerialNumberRemove">
              <label for="SerialNumber" class="form-label col-12">หมายเลขเครื่อง (Serial Number)*</label>
              <input type="text" class="form-control mb-2 SerialNumber" name="SerialNumber" id="SerialNumber" minlength="17" maxlength="17" placeholder="ASP02065010000001">
              <i type="button" class="bi bi-question-circle position-absolute top-30 start-100" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
              <div class="invalid-feedback mb-2 SerialNumber_show">
                กรุณากรอก หมายเลขเครื่องให้ครบ 17 ตัว
              </div>
              <div class="text-danger status_rn d-none">
                ไม่มีหมายเลขเครื่องที่ท่านต้องการลงทะเบียน
              </div>
            </div>
            <div class="col-lg-12 m-0">
              <div class="form-check">
                <label class="form-check-label" for="exampleCheck1">ลงทะเบียนมากกว่า 1 เครื่อง</label>
                <input type="checkbox" class="form-check-input" id="myCheck" onclick="myFunction()">
              </div>
            </div>
            <div class="col-lg-12 m-0" id="SerialNumberALL" style="display: none;">
              <div class="row">
                <p class="text-danger my-2 h5">* ดูวิธีการลงทะเบียนหลายเครื่องโดยคลิกที่เครื่องหมาย คลิกที่ ?</p>
                <div class="col-lg-6 position-relative">
                  <label for="SerialNumber_Start" class="form-label">หมายเลขเครื่อง (Serial Number) เริ่มต้น*</label>
                  <input type="text" class="form-control mb-2 SerialNumber" name="SerialNumber_Start" id="SerialNumber_Start" minlength="17" maxlength="17" placeholder="ASP02065010000001">
                  <div class="invalid-feedback mb-2 SerialNumber_show">
                    กรุณากรอกหมายเลขเครื่องให้ครบ 17 ตัว ทั้ง 2 ช่อง
                  </div>
                  <div class="text-danger status_rn d-none">
                    ไม่มีหมายเลขเครื่องที่ท่านต้องการลงทะเบียน
                  </div>
                  <h1 class="position-absolute top-82 start-100">-</h1>
                </div>
                <div class="col-lg-6 position-relative">
                  <label for="SerialNumber_End" class="form-label">หมายเลขเครื่อง (Serial Number) สิ้นสุด*</label>
                  <input type="text" class="form-control mb-2" name="SerialNumber_End" id="SerialNumber_End" minlength="17" maxlength="17" placeholder="ASP02065010000100">
                  <i type="button" class="bi bi-question-circle position-absolute top-82 start-100" data-bs-toggle="modal" data-bs-target="#exampleModal1"></i>
                  <div class="invalid-feedback mb-2 SerialNumber_show">
                    กรุณากรอกหมายเลขเครื่องให้ครบ 17 ตัว ทั้ง 2 ช่อง
                  </div>
                  <div class="text-danger status_rn d-none">
                    ไม่มีหมายเลขเครื่องที่ท่านต้องการลงทะเบียน
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 co-12 mb-2">
              <label for="Brand" class="form-label">เเบรนด์ (Brand)</label>
              <select class="form-control" id="Brand" name="Brand" disabled>
                <option value=""></option>
                <option value="Natural AirFresh">Natural AirFresh</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-6 co-12 mb-2">
              <label for="Product" class="form-label">สินค้า (Product)</label>
              <select class="form-control" id="Product" name="Product" disabled>
                <option value=""></option>
                <option value="Air Sterilizing Purifier">Air Sterilizing Purifier</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-2">
              <label for="Model" class="form-label">รุ่น (Model)</label>
              <select class="form-control" id="Model" name="Model" disabled>
                <option value=""></option>
                <option value="ASP20">ASP-20</option>
                <option value="ASP40">ASP-40</option>
                <option value="ASP80">ASP-80</option>
                <option value="ASP480">ASP-480</option>
                <option value="ASPC4">ASP-C4</option>
                <option value="ASPB4">ASP-B4</option>
                <option value="ASPE4">ASP-E4</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-6 co-12 mb-2">
              <label for="Warranty" class="form-label">รับประกัน (Warranty)</label>
              <select class="form-control" id="Warranty" name="Warranty" disabled>
                <option value=""></option>
                <option value="1">1ปี</option>
                <option value="2">2ปี</option>
                <option value="3">3ปี</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <label for="Dealer" class="form-label">ร้านค้า (Dealer)</label>
              <input type="text" class="form-control" name="Dealer" id="Dealer" disabled>
            </div>
            <div class="col-lg-4 col-md-6 col-md-6 col-sm-12">
              <label for="Purchase_date" class="form-label">วันที่ซื้อ (Purchase date)*</label>
              <input type="text" class="form-control" name="Purchase_date" id="Purchase_date" required>
              <div class="invalid-feedback">
                กรุณากรอก วันที่ซื้อ
              </div>
            </div>
            <span class="title">ข้อมูลส่วนตัว (Personal Information)</span>
            <hr>
            <div class="col-lg-4 col-md-12 col-sm-12 m-0">
              <label for="Customer_name" class="form-label">ชื่อ-นามสกุล (Customer Name)*</label>
              <input type="text" class="form-control" name="Customer_name" id="Customer_name" required>
              <div class="invalid-feedback">
                กรุณากรอก ชื่อ-นามสกุล
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 m-0">
              <label for="Email" class="form-label">อีเมล (Email)</label>
              <input type="email" class="form-control" name="Email" id="Email">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 m-0">
              <label for="Tel" class="form-label">เบอร์โทร (Tel)*</label>
              <input type="text" class="form-control" name="Tel" id="Tel" required>
              <div class="invalid-feedback">
                กรุณากรอก เบอร์โทร.
              </div>
            </div>
            <span class="title">ที่อยู่ (Address)</span>
            <hr>
            <div class="col-xl-6 col-md-6 col-sm-12 m-0">
              <label for="Number" class="form-label">เลขที่(Number)*</label>
              <input type="text" class="form-control" name="Number" id="Number" required>
              <div class="invalid-feedback">
                กรุณากรอก เลขที่
              </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 m-0">
              <label for="Village" class="form-label">หมู่ที่ หมู่บ้าน/อาคาร (Village/Building)</label>
              <input type="text" class="form-control" name="Village" id="Village">

            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 m-0">
              <label for="Soi" class="form-label">ซอย (Alley/Soi)</label>
              <input type="text" class="form-control" name="Soi" id="Soi">

            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 m-0">
              <label for="Road" class="form-label">ถนน (Road)</label>
              <input type="text" class="form-control" name="Road" id="Road">

            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
              <label for="District" class="form-label">ตำบล (Sub-District)*</label>
              <input name="district" id="district" type="text" class="form-control" required>
              <div class="invalid-feedback">
                กรุณากรอก ตำบล
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
              <label for="amphure" class="form-label">อำเภอ (District)*</label>
              <input name="amphure" id="amphure" type="text" class="form-control" required>
              <div class="invalid-feedback">
                กรุณากรอก อำเภอ
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
              <label for="province" class="form-label">จังหวัด (Province)*</label>
              <input name="province" id="province" type="text" class="form-control" required>
              <div class="invalid-feedback">
                กรุณากรอก จังหวัด
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
              <label for="Zip" class="form-label">รหัสไปรษณีย์ (Zip Code)*</label>
              <input name="zipcode" id="zipcode" type="text" class="form-control" required>
              <div class="invalid-feedback">
                กรุณากรอก รหัสไปรษณีย์
              </div>
            </div>
            <div class="col-12 text-center mt-4 fo-button">
              <button type="submit" disabled style="display: none" aria-hidden="true"></button>
              <button type="submit" class="btn btn-primary px-5 py-3 disabled" id="register_sell_save">ลงทะเบียน</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="table-show-create" class="team section-bg pt-2 pb-5 d-none">
  <div class="container" data-aos="fade-up">
    <div class="section-title col-lg-6 mx-auto p-2" style="text-align: start;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-body">
            <div class="table-responsive">
              <div id="table-text-create">
              </div>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>หมายเลขเครื่อง</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>หมายเลขเครื่อง</th>
                    <th>สถานะ</th>
                  </tr>
                </tfoot>
                <tbody id="tBody" class="h5 font-weight-bold">

                </tbody>
              </table>
              <div class="row">
                <h5 class="text-danger col-12">หมายเหตุ*</h5>
                <p class="col-12"><span class="text-success ">SUCCESS : </span>หมายเลขเครื่องบันทึกลงฐานข้อมูลเรียบร้อยเเล้ว</p>
                <p class="col-12"><span class="text-danger  ">FAIL : </span>หมายเลขเครื่องไม่ถูกต้องหรือมีหมายเลขเครื่องนั้นอยู่เเล้ว</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>