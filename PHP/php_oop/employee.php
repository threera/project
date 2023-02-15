<?php 

require_once "company.php";

 class Employee{
    public $name;
    public $department;
    public $salary;

    //เรียกใช้ได้
    // protected $company = "ABC";

    //เรียกใช้ทันที่ที่เรียกใช้ class ตอนเริ่ม
    function __construct($name,$department,$salary){
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
        echo "<br/>";
    }

    //เรียกใช้ทันที่ที่เรียกใช้ class ตอนจบ
    function __destruct(){
        echo "จบ";
    }


    public function setName($name){
        $this->name = $name;
    }

    public function setDepartment($department){
        $this->name = $department;
    }

    public function setSalary($salary){
        $this->name = $salary;
    }

    public function showData(){
        echo "ซื่อ = ".$this->name."<br/>";
        echo "เเผนก = ".$this->department."<br/>";
        echo "เงินเดือน = ".$this->salary."<br/>";
    }


    // //เป็น function ที่ต้องเรียกใช้ ถ้าลูกสืบทอดไป abstract function
    // abstract public function description();

    // //return string ออกไป abstract function
    // abstract public function getBonus():string;
}