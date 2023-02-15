<!-- input 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">สามารถดู หมายเลขเครื่อง (Serial Number) ได้ที่</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <img src="assets/img/modal/SN.png" class="col-12" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- input2
 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">วิธีการลงทะเบียนมากกว่า 1 เครื่อง</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-break">
          <p><span>หมายเลขเครื่องต้องเรียงกัน</span> เช่น ASP02065010000001,ASP02065010000002,...,ASP02065010000010</p>
          <p>1.<span>ใส่ หมายเลขเครื่องเริ่มต้น เช่น ASP02065010000001</span></p>
          <input type="text" class="form-control mb-2" placeholder="ASP02065010000001" disabled>
          <p>2.<span>ใส่ หมายเลขเครื่องสิ้นสุด เช่น ASP02065010000003</span></p>
          <input type="text" class="form-control mb-2" placeholder="ASP02065010000003" disabled>
          <p>3.<span>คุณจะได้การลงทะเบียน 3 เครื่อง</span></p>
		  <p>คือ <span>ASP02065010000001,ASP02065010000002,ASP02065010000003</span></p>
          <p>4.<span>ข้อมูลส่วนตัวเเละที่อยู่ จะเหมือนกัน</span></p>
          <p class="text-danger">หมายเหตุ<span>**ในกรณีที่หมายเลขเครื่องไม่เรียงกัน กรุณาใช้วิธีการลงทะเบียนครั้งละ 1 เครื่อง</span></p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>