<?php 

require_once "employee.php";

class Accounting extends Employee {
    function __construct($name,$salary){
        //เรียกใช้ construct class เเม่
        parent::__construct($name,"บัญชี",$salary);
    }

    function description(){
        echo "ทำงานการเงิน"."<br/>";
    }

    function getBonus():string{
        return "0.5"."<br/>";
    }
}