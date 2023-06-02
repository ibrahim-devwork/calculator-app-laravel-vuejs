<?php 
namespace App\Services;

use App\Services\AdderService;
use App\Services\DivisionService;
use App\Services\MinusService;
use App\Services\MultipleService;

class CalculatorService {
    
    private $adderService;
    private $minusService;
    private $multipleService;
    private $divisionService;

    public function __construct(
        AdderService $adderService, 
        MinusService $minusService,
        MultipleService $multipleService,
        DivisionService $divisionService,
     ) {

        $this->adderService     = $adderService;
        $this->minusService     = $minusService;
        $this->multipleService  = $multipleService;
        $this->divisionService  = $divisionService;
    }

    public function calculate($data) : float {
        $operation      = intVal($data['operation']);
        $first_number   = $data['first_number'];
        $second_number  = $data['second_number'];

        return match( $operation ) {
            0 => $this->adderService->calculate($first_number, $second_number),
            1 => $this->minusService->calculate($first_number, $second_number),
            2 => $this->multipleService->calculate($first_number, $second_number),
            3 => $this->divisionService->calculate($first_number, $second_number),
        };
    }
}

?>