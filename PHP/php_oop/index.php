<?php 

require_once "employee.php";

//histing
$emp1 = new Employee("เสือ","ประธาน",100000);
$emp2 = new Employee("สิง","เลขา",50000);


showEmployee($emp1);
showEmployee($emp2);

function showEmployee(Employee $obj){
    echo "ข้อมูลพนักงาน <br>";
    echo "ซื่อ".$obj->name."<br>";
    echo "ซื่อ".$obj->department."<br>";
    echo "ซื่อ".$obj->salary."<br>";
}





//เรียกใช้ static 
// echo Company::$companyName;
// Company::info();

// $emp1 = new Programmer("เสือ",30000);
// $emp1->showData();
// $emp1->officeName("AF");
// echo $emp1->setWorking("AAAAAAAA");
// // //overloading method เรียกใช้
// // $emp1->skill("php","c");

// //เเสดง string ที่เเปลง จาก obj
// echo $emp1;




// $emp2 = new Accounting("เจน",20000);
// $emp2->showData();
// $emp2->description();
// echo "โบนัส" .$emp2->getBonus();