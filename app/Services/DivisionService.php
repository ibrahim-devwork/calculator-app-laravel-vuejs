<?php 

namespace App\Services;

class DivisionService implements InterfaceCalculatorService {

    public function calculate($firstNumber, $secondNumber) : float {
        return round((floatVal($firstNumber) / floatVal($secondNumber)), 2);
    }
}

?>