<?php
include('../../server/connect/connect.php');
$search_item = $_POST['search'];
$query = "select * from product where SerialNumber = '$search_item'";
$result = mysqli_query($conn, $query) or die("Query failed");
$output = '';

function date_edit_warranty($datetime_edit, $warranty_edit)
{
    return date('Y-m-d', strtotime($datetime_edit . "+$warranty_edit years"));
}

function date_edit($date_edit)
{
    return date('d/m/Y', strtotime($date_edit . "+543 years 7 day"));
}

if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="table-responsive">  
    <table class="table table-bordered">';
    $row = mysqli_fetch_array($result);
        if (date_edit_warranty($row['Purchase_date'], $row['Warranty']) > date('Y/m/d')) {
            $Purchase = "สินค้าอยู่ในการรับประกัน";
        } else {
            $Purchase = "สินค้าหมดการรับประกันเเล้ว";
        }
        $output .= '
        <h3 class="mt-3 text-secondary text-center">' . $row["SerialNumber"] . '</h3>
        <tr>  
        <td width="30%"><label>สถานะ</label></td>  
        <td width="70%" class="text-success h3">' . $Purchase . '</td>  
        </tr> 
        <tr>  
            <td width="30%"><label>เริ่มรับประกัน</label></td>  
            <td width="70%">' . date_edit($row['Purchase_date']) . '</td>  
        </tr> 
        <tr>  
            <td width="30%"><label>สิ้นสุดรับประกัน</label></td>  
            <td width="70%">' . date_edit(date_edit_warranty($row['Purchase_date'], $row['Warranty'])) . '</td>  
        </tr>
        <tr>  
        <td width="30%"><label>การรับประกัน</label></td>  
        <td width="70%">2ปี + 7วัน</td>  
    </tr>
        ';
    $output .= '</table>  
    </div>';
} else {
    $output .= '<h3 class="mt-2 text-danger">ไม่มีหมายเลขเครื่องนี้</h3>';
}
echo $output;
