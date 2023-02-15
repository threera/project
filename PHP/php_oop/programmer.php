<?php 

require_once "office.php";
require_once "employee.php";

//สืบทอด class ใช้ extends 
//สืบทอด interface ใช้ implements
class Programmer extends Employee implements office  {
    function __construct($name,$salary){
        //เรียกใช้ construct class เเม่
        parent::__construct($name,"โปรเเกรมเมอร์",$salary);
    }

    function description(){
        echo "เขียนโปรเเกรม"."<br/>";
    } 

    function getBonus():string{
        return "1<br/>";
    }

    //overloading method มาช่วย method ที่มีซื่อเหมือนกันอยู่ใน class เดียวกัน
    function __call($name, $args){
        if($name=="skill"){
            $c = count($args);
            switch($c){
                case 1:
                    echo "ภาษาที่เขียนได้" .$args[0];
                    break;
                case 2:
                    echo "ภาษาที่เขียนได้" .$args[0].$args[1];
                    break;
                case 3:
                    echo "ภาษาที่เขียนได้" .$args[0].$args[1].$args[2];
                    break;
                default:
                    echo "ไม่มีข้อมูล <br>";
                    break;
            }
        }
    }

    //แปลง obj เป็น string
    function __toString():string{
        return "เรียกใช้ ";
    }


    //overriding method มาจาก class เเม่ Employee 
    public function showData(){
        echo "ซื่อ = ".$this->name."<br/>";
        echo "เเผนก = ".$this->department."<br/>";
        echo "ค่าจ้าง = ".$this->salary."<br/>";
    }

    public function officeName($name){
      echo "สำนักงาน" .$name ;
    }

    public function setWorking($work):string{
        return "รูปเเบบงาน" .$work;
    }
    
}