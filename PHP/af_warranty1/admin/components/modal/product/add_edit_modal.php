<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไขสินค้า</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="col-lg-12 mb-2">
                        <label for="SerialNumber" class="form-label col-12">หมายเลขเครื่อง (Serial Number)</label>
                        <input type="text" class="form-control mb-2 " name="SerialNumber" id="SerialNumber" minlength="17" maxlength="17" placeholder="ASP02065010000001">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Brand" class="form-label">เเบรนด์ (Brand)</label>
                        <select class="form-control" id="Brand" name="Brand">
                            <option value="">เลือกเเบรนด์</option>
                            <option value="Natural AirFresh">Natural AirFresh</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Product" class="form-label">สินค้า (Product)</label>
                        <select class="form-control" id="Product" name="Product">
                            <option value="">เลือกสินค้า</option>
                            <option value="Air Sterilizing Purifier">Air Sterilizing Purifier</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
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
                    <div class="col-lg-12 mb-2">
                        <label for="Warranty" class="form-label">รับประกัน (Warranty)</label>
                        <select class="form-control" id="Warranty" name="Warranty">
                            <option value="">เลือกรับประกัน</option>
                            <option value="1">1ปี</option>
                            <option value="2">2ปี</option>
                            <option value="3">3ปี</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Dealer" class="form-label">ร้านค้า (Dealer)</label>
                        <input type="text" class="form-control" name="Dealer" id="Dealer">
                    </div>
                    <div class=" col-lg-12 mb-2">
                        <label for="Purchase_date" class="form-label">วันที่สั่งซื้อ (Purchase date)</label>
                        <input type="date" class="form-control" name="Purchase_date" id="Purchase_date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31">
                    </div>
                    <span class="title col-12 mt-3">ข้อมูลส่วนตัว (Personal Information)</span>
                    <hr>
                    <div class="col-lg-12 mb-2">
                        <label for="Customer_name" class="form-label">ชื่อ-นามสกุล (Customer name)</label>
                        <input type="text" class="form-control" name="Customer_name" id="Customer_name">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Email" class="form-label">อีเมล (Email)</label>
                        <input type="email" class="form-control" name="Email" id="Email">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Tel" class="form-label">เบอร์โทร (Tel)</label>
                        <input type="text" class="form-control" name="Tel" id="Tel">
                    </div>
                    <span class="title col-12 mt-3">ที่อยู่ (Address)</span>
                    <hr>
                    <div class="col-lg-12 mb-2">
                        <label for="Number" class="form-label">เลขที่ (Number)</label>
                        <input type="text" class="form-control" name="Number" id="Number">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Village" class="form-label">หมู่ (Village)</label>
                        <input type="text" class="form-control" name="Village" id="Village">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Soi" class="form-label">ซอย (Alley/Soi)</label>
                        <input type="text" class="form-control" name="Soi" id="Soi">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Road" class="form-label">ถนน (Road)</label>
                        <input type="text" class="form-control" name="Road" id="Road">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Province" class="form-label">จังหวัด (Province)</label>
                        <select name="province" id="province" class="form-control">
                            <option value="">เลือกจังหวัด</option>
                            <?php
                            $sql = "SELECT * FROM provinces";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($query)) : ?>
                                <option value="<?= $result['name_th'] ?>"><?= $result['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="District" class="form-label">อำเภอ (Amphure)</label>
                        <select name="amphure" id="amphure" class="form-control">
                            <option value="">เลือกอำเภอ</option>
                            <?php
                            $sql = "SELECT * FROM amphures";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($query)) : ?>
                                <option value="<?= $result['name_th'] ?>"><?= $result['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="District" class="form-label">ตำบล (Sub-District)</label>
                        <select name="district" id="district" class="form-control">
                            <option value="">เลือกตำบล</option>
                            <?php
                            $sql = "SELECT * FROM districts";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($query)) : ?>
                                <option value="<?= $result['name_th'] ?>"><?= $result['name_th'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Zip" class="form-label">รหัสไปรษณีย์ (Zip Code)</label>
                        <input name="zipcode" id="zipcode" type="text" class="form-control">
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="Comment" class="form-label">เพิ่มเติม (Comment)</label>
                        <textarea type="text" class="form-control" name="Comment" id="Comment"></textarea>
                    </div>
                    <div class="col-12 text-center mt-4 fo-button">
                        <input type="hidden" name="employee_id" id="employee_id" />
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-warning" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>