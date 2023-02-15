<?php

final class Company{
    
    //static เรียกใช้ได้เลยไม่ต้องเรียกผ่าน obj
    static public $companyName = "บริษัท AAAA";
    static public function info() {
        echo "เจ้าของ เสือ";
    }
}

// final class Company{
//     //เรียกใช้ได้เเต่เเก้ไขไม่ได้ final
//     final public function companyName() {
//         echo "บริษัท AAA";
//     }
// }