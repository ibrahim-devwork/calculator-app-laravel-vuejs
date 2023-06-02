<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\CalculatorService;
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
            $result = $this->calculatorService->calculate($data);
            return response()->json(["result" => $result], 200);
            
        } catch(Exception $error) {
            Log::error($error->getMessage());
            return response()->json(["error" => "Server error !"], 500);
        }

    }
}