<?php

//เเก้ไขวันที่ลงทะเบียนการรับประกัน
 function date_edit_warranty($datetime_edit,$warranty_edit){
    return date('Y-m-d', strtotime($datetime_edit . "+$warranty_edit years 7 day"));
  }

  //เเก้ไขวันที่ปัจจุบัน
 function date_edit($date_edit){
    return date('d/m/Y', strtotime($date_edit . "+543 years 7 day"));
  }
?>