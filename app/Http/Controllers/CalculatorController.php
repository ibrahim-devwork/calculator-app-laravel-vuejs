<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\AdderService;
use App\Services\CalculatorService;
use App\Services\DivisionService;
use App\Services\MinusService;
use App\Services\MultipleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalculatorController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(CalculatorRequest $calculatorRequest)
    {
        try {

            $data       = $calculatorRequest->validated();
            $calculator = new CalculatorService();
            $calculator->setOperation($this->buildCalculator($data['operation']));
            $result = $calculator->calculate($data['first_number'], $data['second_number']);
            return response()->json( ["result" => $result ], 200);
            
        } catch(Exception $error) {
            Log::error($error->getMessage());
            return response()->json(["error" => "Server error !"], 500);
        }

    }

    public function buildCalculator($operation) {
        return match ($operation) {
            0 => new AdderService(),
            1 => new MinusService(),
            2 => new MultipleService(),
            3 => new DivisionService(),
        };
    }

}