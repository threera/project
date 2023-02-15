
<?php
 //เเก้ไขวันที่ปัจจุบัน
 include '../../components/link/function.php';

if (isset($_POST["employee_id"])) {
     $output = '';
     include('../../server/connect/connect.php');
     $query = " SELECT * FROM register_sell WHERE id = '" . $_POST["employee_id"] . "'";
     $result = mysqli_query($conn, $query);

     $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
     while ($row = mysqli_fetch_array($result)) {

          $output .= '
                <tr>  
                     <td width="30%"><label>หมายเลขเครื่อง</label></td>  
                     <td width="70%">' . $row["SerialNumber"] . '</td>  
                </tr>
                 <tr>
                     <td width="30%"><label>วันที่ลงทะเบียน</label></td>  
                     <td width="70%">' . date_edit($row["Register_date"]) . '</td>  
                </tr>
                <tr>  
                <td width="30%"><label>เเบรนด์</label></td>  
                <td width="70%">' . $row["Brand"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>สินค้า</label></td>  
               <td width="70%">' . $row["Product"] . '</td>  
              </tr>  
               <tr>  
               <td width="30%"><label>รุ่น</label></td>  
               <td width="70%">' . $row["Model"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>ร้านค้า</label></td>  
               <td width="70%">' . $row["Dealer"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>วันที่สั่งซื้อ</label></td>  
               <td width="70%">' . date_edit_start($row["Purchase_date"]) . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>ชื่อ-นามสกุล</label></td>  
               <td width="70%">' . $row["Customer_name"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>อีเมล</label></td>  
               <td width="70%">' . $row["Email"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>เบอร์โทร</label></td>  
               <td width="70%">' . $row["Tel"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>เลขที่</label></td>  
               <td width="70%">' . $row["Number"] . '</td>  
               </tr>
               <tr>  
               <td width="30%"><label>หมู่ที่ หมู่บ้าน/อาคาร</label></td>  
               <td width="70%">' . $row["Village"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>ซอย</label></td>  
               <td width="70%">' . $row["Soi"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>ถนน</label></td>  
               <td width="70%">' . $row["Road"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>จังหวัด</label></td>  
               <td width="70%">' . $row["province"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>อำเภอ</label></td>  
               <td width="70%">' . $row["amphure"] . '</td>  
               </tr>  
               <tr>  
               <td width="30%"><label>ตำบล</label></td>  
               <td width="70%">' . $row["district"] . '</td>  
               </tr> 
               <tr>  
               <td width="30%"><label>รหัสไปรษณีย์</label></td>  
               <td width="70%">' . $row["zipcode"] . '</td>  
               </tr>
               <tr>  
               <td width="30%"><label>เพิ่มเติม</label></td>  
               <td width="70%">' . $row["Comment"] . '</td>  
               </tr> 
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}
