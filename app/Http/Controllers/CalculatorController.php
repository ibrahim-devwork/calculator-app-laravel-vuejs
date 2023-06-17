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
    private $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function __invoke(CalculatorRequest $calculatorRequest)
    {
        try {

            $data   = $calculatorRequest->validated();
            $result = $this->calculatorService->calculator($this->buildCalculator($data['operation']), $data['first_number'], $data['second_number']);
            return response()->json(["result" => $result], 200);
            
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