<?php
// px($transpot);

require_once(FCPATH . '/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//set My Spreadsheet
$FILE_NAME  = label('order_recording_other');
$DATE       = mainDate();
$TIME       = mainTime();
$STAFF      = ssUser('employee_username');
$COMPANY_TH = company('thailand');
$COMPANY_EN = company('english');
$TITLE      = label('document_manager')." $STAFF ".label('date')." $DATE ".label('time')." $TIME";
$colExcel   = colExcel(38);

//new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//set Title
$sheet->setTitle($FILE_NAME);

//set Format
$sheet->getStyle('X')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
$sheet->getStyle('AB:AD')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$sheet->getStyle('AH')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$sheet->getStyle('AK')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
$sheet->getStyle('AL')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

//set Align
$sheet->getStyle('A1:AM5')->getAlignment()->setHorizontal('center');

//set Bold
$sheet->getStyle('A1:AM5')->getFont()->setBold(true);

//set Company
$sheet->setCellValue('A1', $COMPANY_TH)->mergeCells('A1:AN1');
$sheet->setCellValue('A2', $COMPANY_EN)->mergeCells('A2:AN2');
$sheet->setCellValue('A3', $FILE_NAME)->mergeCells('A3:AN3');
$sheet->setCellValue('A4', $TITLE)->mergeCells('A4:AN4');

//set Background Color
$sheet->getStyle('A5:AM5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('B7DEE8');

//set Width
foreach ($colExcel as $key => $value) 
{
    $sheet->getColumnDimension($value)->setAutoSize(true);
}

$sheet
->setCellValue('A5', label('warehouse'))
->setCellValue('B5', label('document_number'))
->setCellValue('C5', label('transaction_date'))
->setCellValue('D5', label('document_date'))
->setCellValue('E5', label('customer_name'))
->setCellValue('F5', label('telephone'))
->setCellValue('G5', label('mobile'))
->setCellValue('H5', label('mail'))
->setCellValue('I5', label('fax'))
->setCellValue('J5', label('tax_identification_number'))
->setCellValue('K5', label('address'))
->setCellValue('L5', label('delivery_address'))
->setCellValue('M5', label('contact_person'))
->setCellValue('N5', label('mobile'))
->setCellValue('O5', label('orders_for'))
->setCellValue('P5', label('salesperson'))
->setCellValue('Q5', label('sales_channels'))
->setCellValue('R5', label('payment_type'))
->setCellValue('S5', label('other_notes'))
->setCellValue('T5', label('description'))
->setCellValue('U5', label('remark'))
->setCellValue('V5', label('shipping_company'))
->setCellValue('W5', label('transport_company_branch'))
->setCellValue('X5', label('product_code'))
->setCellValue('Y5', label('product_description'))
->setCellValue('Z5', label('amount'))
->setCellValue('AA5', label('unit'))
->setCellValue('AB5', label('price'))
->setCellValue('AC5', label('discount'))
->setCellValue('AD5', label('total_price'))
->setCellValue('AE5', label('set_lift'))
->setCellValue('AF5', label('tax_exemption'))
->setCellValue('AG5', label('discount_end_bill').' (%)')
->setCellValue('AH5', label('discount_end_bill').' ('.label('bath').')')
->setCellValue('AI5', label('vat_status'))
->setCellValue('AJ5', label('vat').' (%)')
->setCellValue('AK5', label('vat').' ('.label('bath').')')
->setCellValue('AL5', label('total_price_all'));

$Currency[0] = label('not_specified');
$typePayments[0]=label('not_specified');
// pp($order);
$i = 6;
if(!empty($order))
{
    foreach ($order as $index => $value)
    {
        if($value->sum_vat_radio == 1)
        {
            $sum_vat_radio = label('include_vat');
        }
        else
        {
            $sum_vat_radio = label('exclude_vat');
        }

        if($value->sum_vat_check == 1)
        {
            $sum_vat_check = '/';
        }
        else
        {
            $sum_vat_check = '-';
        }

        if($value->order_type == 1)
        {
            $order_type = label('sales');
        }
        else
        {
            $order_type = label('withdraw');
        }

        if(!empty($value->detail))
        {
            foreach ($value->detail as $key => $val) 
            {
                if($val->check_set_lift == 1)
                {
                    $check_set_lift = '/';
                    $price_total    = ($val->order_detail_price-$val->order_detail_discount);
                }
                else
                {
                    $check_set_lift = '-';
                    $price_total    = (($val->order_detail_price*$val->order_detail_qty)-$val->order_detail_discount);
                }

                if($val->check_except_vat == 1)
                {
                    $check_except_vat = '/';
                }
                else
                {
                    $check_except_vat = '-';
                }

                $type_payment = [];
                if ($value->order_type_payment_1 != 0) 
                {
                    $type_payment[] = $typePayments[$value->order_type_payment_1];
                }
                if ($value->order_type_payment_2 != 0) 
                {
                    $type_payment[] = $typePayments[$value->order_type_payment_2];
                }
                if ($value->order_type_payment_3 != 0) 
                {
                    $type_payment[] = $typePayments[$value->order_type_payment_3];
                }
                if (count($type_payment) > 0) 
                {
                    $payment = implode(", " , $type_payment);
                }
                $sheet->setCellValue("A$i", $value->warehouse_name);
                $sheet->setCellValue("B$i", $value->order_code);
                $sheet->setCellValue("C$i", $value->order_created_at);
                $sheet->setCellValue("D$i", $value->order_document_date);
                $sheet->setCellValue("E$i", $value->customer_name);
                $sheet->setCellValue("F$i", $value->customer_tel);
                $sheet->setCellValue("G$i", $value->customer_mobile);
                $sheet->setCellValue("H$i", $value->customer_email);
                $sheet->setCellValue("I$i", $value->customer_fax);
                $sheet->setCellValue("J$i", $value->customer_iden_number);
                $sheet->setCellValue("K$i", $value->customer_addr);
                $sheet->setCellValue("L$i", $value->customer_detail_addr_send);
                $sheet->setCellValue("M$i", $value->customer_detail_contact);
                $sheet->setCellValue("N$i", $value->customer_detail_mobile);
                $sheet->setCellValue("O$i", $order_type);
                $sheet->setCellValue("P$i", $value->order_sell_name);
                $sheet->setCellValue("Q$i", $value->order_sell_channel);
                $sheet->setCellValue("R$i", $payment);
                $sheet->setCellValue("S$i", $value->order_note);
                $sheet->setCellValue("T$i", $value->order_description);
                $sheet->setCellValue("U$i", $value->order_remarks);
                $sheet->setCellValue("V$i", $value->transport_name);
                $sheet->setCellValue("W$i", $value->transport_detail_name);
                $sheet->setCellValue("X$i", $val->history->product_code);
                $sheet->setCellValue("Y$i", productDescription($val->history));
                $sheet->setCellValue("Z$i", $val->order_detail_qty);
                $sheet->setCellValue("AA$i", $val->history->product_unit);
                $sheet->setCellValue("AB$i", $val->order_detail_price);
                $sheet->setCellValue("AC$i", $val->order_detail_discount);
                $sheet->setCellValue("AD$i", $price_total);
                $sheet->setCellValue("AE$i", $check_set_lift);
                $sheet->setCellValue("AF$i", $check_except_vat);
                $sheet->setCellValue("AG$i", $value->sum_discount_percent);
                $sheet->setCellValue("AH$i", $value->sum_discount_value);
                $sheet->setCellValue("AI$i", $sum_vat_check);
                $sheet->setCellValue("AJ$i", $value->sum_vat_percent);
                $sheet->setCellValue("AK$i", $value->sum_vat_value);
                $sheet->setCellValue("AL$i", $value->total_price_all);

                $i++;
            }
        }  
    }
}

// to Xlsx
$writer = new Xlsx($spreadsheet);

// Download
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$FILE_NAME.xlsx\"");
header("Cache-Control: max-age=0");
$writer->save('php://output');	
exit();
?>