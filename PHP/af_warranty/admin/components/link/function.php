<?php

//เเก้ไขวันที่ลงทะเบียนการรับประกัน
function date_edit_warranty($datetime_edit, $warranty_edit)
{
	return date('d-m-Y H:i:s', strtotime($datetime_edit . "+$warranty_edit years 7 day"));
}

function date_edit_warranty_edit($datetime_edit, $warranty_edit)
{
	return date('Y-m-d', strtotime($datetime_edit . "+$warranty_edit years 7 day"));
}

//เเก้ไขวันที่ปัจจุบัน
function date_edit($date_edit)
{
	return date('d-m-Y H:i:s', strtotime($date_edit . "+543 years"));
}

function date_edit_start($date_edit)
{
	return date('d-m-Y', strtotime($date_edit . "+543 years"));
}


function compareDate($date1, $date2)
{
	$arrDate1 = explode("-", $date1);
	$arrDate2 = explode("-", $date2);
	$timStmp1 = mktime(0, 0, 0, $arrDate1[1], $arrDate1[2], $arrDate1[0]);
	$timStmp2 = mktime(0, 0, 0, $arrDate2[1], $arrDate2[2], $arrDate2[0]);

	if ($timStmp1 >= $timStmp2) {
		return 1;
	} else {
		return 0;
	}
}

function date_edit_insert($date_edit)
{
	$date = str_replace("/", "-", $date_edit);
	return date('Y/m/d', strtotime($date . "-543 years"));
}

