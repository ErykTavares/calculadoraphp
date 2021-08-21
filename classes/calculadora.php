<?php
class Caluladora{

    private $num1;
    private $num2;
    private $result;

    function __construct(){
        $this-> num1 = 0;
        $this -> num2 = 0;
        $this -> result = 0;
    }

    function setNumber($number1, $number2){
        $this -> num1 = $number1;
        $this -> num2 = $number2;
    }

}



?>