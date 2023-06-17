<?php 
namespace App\Services;

class CalculatorService implements InterfaceCalculatorService {

    protected $interfaceCalculatorService;

    public function setOperation(InterfaceCalculatorService $interfaceCalculatorService) {
        $this->interfaceCalculatorService = $interfaceCalculatorService;
    }

    public function calculate($firstNumber, $secondNumber): float
    {
        return $this->interfaceCalculatorService->calculate($firstNumber, $secondNumber);
    }

}
?>