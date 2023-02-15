<form id="form_create_product" method="POST" class="row g-3 needs-validation" novalidate>
	<span class="title col-12">ผลิตภัณฑ์ (Product)</span>
	<hr>
	<div class="col-xl-6 col-12" id="SerialNumber_none">
		<label for="SerialNumber" class="form-label">หมายเลขเครื่อง (Serial Number)</label>
		<input type="text" class="form-control mb-2 " name="SerialNumber" id="SerialNumber" minlength="17" maxlength="17" required placeholder="ASP02065010000001">
		<div class="invalid-feedback mb-2 SerialNumber_show">
			กรุณากรอก หมายเลขเครื่องให้ครบ 17 ตัว
		</div>
		<div class="text-danger status_rn d-none">
			มีหมายเลขเครื่องนี้เเเล้ว
		</div>
	</div>
	<div class="col-12 my-2">
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="myCheck"">
			<label class=" form-check-label" for="exampleCheck1">ลงทะเบียนมากกว่า 1 ตัว</label>
		</div>
	</div>
	<div class="col-xl-12 col-12 m-0 d-none" id="SerialNumberALL">
		<div class="row">
			<div class="col-xl-6 col-12 position-relative">
				<label for="SerialNumber_Start" class="form-label">หมายเลขเครื่อง (Serial Number) เริ่มต้น</label>
				<input type="text" class="form-control mb-2 SerialNumber" name="SerialNumber_Start" id="SerialNumber_Start" minlength="17" maxlength="17" placeholder="ASP02065010000001" style="text-transform: uppercase;">
				<div class="invalid-feedback mb-2 SerialNumber_show">
					กรุณากรอกหมายเลขเครื่องให้ครบ 17 ตัว ทั้ง 2 ช่อง
				</div>
				<div class="text-danger status_rn d-none">
					มีหมายเลขเครื่องนี้เเเล้ว
				</div>
			</div>
			<div class="col-xl-6 col-12 position-relative">
				<label for="SerialNumber_End" class="form-label">หมายเลขเครื่อง (Serial Number) สิ้นสุด</label>
				<input type="text" class="form-control mb-2" name="SerialNumber_End" id="SerialNumber_End" minlength="17" maxlength="17" placeholder="ASP02065010000100" style="text-transform: uppercase;">
				<i type="button" class="bi bi-question-circle position-absolute top-82 start-100" data-bs-toggle="modal" data-bs-target="#exampleModal1"></i>
				<div class="invalid-feedback mb-2 SerialNumber_show">
					กรุณากรอกหมายเลขเครื่องให้ครบ 17 ตัว ทั้ง 2 ช่อง
				</div>
				<div class="text-danger status_rn d-none">
					มีหมายเลขเครื่องนี้เเเล้ว
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 co-12 mb-2">
		<label for="Brand" class="form-label">เเบรนด์ (Brand)</label>
		<select class="form-control" id="Brand" name="Brand">
			<option value="">เลือกเเบรนด์</option>
			<option value="Natural AirFresh">Natural AirFresh</option>
		</select>
	</div>
	<div class="col-lg-4 co-12 mb-2">
		<label for="Product" class="form-label">สินค้า (Product)</label>
		<select class="form-control" id="Product" name="Product">
			<option value="">เลือกสินค้า</option>
			<option value="Air Sterilizing Purifier">Air Sterilizing Purifier</option>
		</select>
	</div>
	<div class="col-lg-4 col-12 mb-2">
		<label for="Model" class="form-label">รุ่น (Model)</label>
		<select class="form-control" id="Model" name="Model">
			<option value="">เลือกรุ่น</option>
			<option value="ASP20">ASP-20</option>
			<option value="ASP40">ASP-40</option>
			<option value="ASP80">ASP-80</option>
			<option value="ASP480">ASP-480</option>
			<option value="ASPC4">ASP-C4</option>
			<option value="ASPB4">ASP-B4</option>
			<option value="ASPE4">ASP-E4</option>
		</select>
	</div>
	<div class="col-lg-4 co-12 mb-2">
		<label for="Warranty" class="form-label">รับประกัน (Warranty)</label>
		<select class="form-control" id="Warranty" name="Warranty">
			<!-- <option value="">เลือกรับประกัน</option>
			<option value="1">1ปี</option> -->
			<option value="2">2ปี</option>
			<!-- <option value="3">3ปี</option> -->
		</select>
	</div>
	<div class="col-lg-4 col-12">
		<label for="Dealer" class="form-label">ร้านค้า (Dealer)</label>
		<input type="text" class="form-control" name="Dealer" id="Dealer">
	</div>
	<div class=" col-lg-4 col-12">
		<label for="Purchase_date" class="form-label">วันที่สั่งซื้อ (Purchase date)</label>
		<input type="date" class="form-control" name="Purchase_date" id="Purchase_date">
		<div class="text-danger" style="font-size: 12px;margin-top: 5px;margin-left: 10px;">
			ถ้าไม่ใส่วันสั่งซื้อ วันสั่งซื้อจะเป็นวันที่ลงทะเบียน
		</div>
	</div>
	<span class="title col-12 mt-3">ข้อมูลส่วนตัว (Personal Information)</span>
	<hr>
	<div class="col-lg-4 col-md-12 col-sm-12">
		<label for="Customer_name" class="form-label">ชื่อ-นามสกุล (Customer name)</label>
		<input type="text" class="form-control" name="Customer_name" id="Customer_name">
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12">
		<label for="Email" class="form-label">อีเมล (Email)</label>
		<input type="email" class="form-control" name="Email" id="Email">
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12">
		<label for="Tel" class="form-label">เบอร์โทร (Tel)</label>
		<input type="text" class="form-control" name="Tel" id="Tel">
	</div>
	<span class="title col-12 mt-3">ที่อยู่ (Address)</span>
	<hr>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Number" class="form-label">เลขที่(Number)</label>
		<input type="text" class="form-control" name="Number" id="Number">
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Village" class="form-label">หมู่บ้าน (Village)</label>
		<input type="text" class="form-control" name="Village" id="Village">
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Soi" class="form-label">ซอย (Alley/Soi)</label>
		<input type="text" class="form-control" name="Soi" id="Soi">
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Road" class="form-label">ถนน (Road)</label>
		<input type="text" class="form-control" name="Road" id="Road">
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Province" class="form-label">จังหวัด (Province)</label>
		<select name="province" id="province" class="form-control">
			<option value="">เลือกจังหวัด</option>
			<?php while ($result = mysqli_fetch_assoc($query)) : ?>
				<option value="<?= $result['name_th'] ?>"><?= $result['name_th'] ?></option>
			<?php endwhile; ?>
		</select>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="District" class="form-label">อำเภอ (District)</label>
		<select name="amphure" id="amphure" class="form-control">
			<option value="">เลือกอำเภอ</option>
		</select>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="District" class="form-label">ตำบล (Sub-District)</label>
		<select name="district" id="district" class="form-control">
			<option value="">ตำบล</option>
		</select>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<label for="Zip" class="form-label">รหัสไปรษณีย์ (Zip Code)</label>
		<input name="zipcode" id="zipcode" type="text" class="form-control" disabled>
	</div>
	<div class="col-12 mt-2">
		<label for="Comment" class="form-label">เพิ่มเติม (Comment)</label>
		<textarea type="text" class="form-control" name="Comment" id="Comment"></textarea>
	</div>
	<div class="col-12 my-2">
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="Customer" name="Customer">
			<label class="form-label" for="customer">ลงทะเบียน ผู้ซื้อ</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="Sell" name="Sell">
			<label class="form-label" for="dealer">ลงทะเบียน ผู้ขาย</label>
		</div>
	</div>
	<div class="col-12 text-center mt-4 fo-button">
		<button type="submit" disabled style="display: none" aria-hidden="true"></button>
		<button type="submit" class="btn btn-primary px-5 py-3 btn-disabled" id="create_product">บันทึกข้อมูล</button>
		<button type="reset" class="btn btn-warning px-5 py-3 ml-4 create_product_reset" id="create_product_reset">RESET</button>
	</div>
</form>