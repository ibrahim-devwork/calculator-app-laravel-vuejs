<?php 
namespace App\Services;

class CalculatorService {
    
    public function calculator(InterfaceCalculatorService $interfaceCalculatorService, $first_number, $second_number) {
       return $interfaceCalculatorService->calculate($first_number, $second_number);
    }

}
?>