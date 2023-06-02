<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GreaterThanZeroIfDivision implements ValidationRule
{

    protected $operation;

    public function __construct($operation) {
        $this->operation = $operation;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail) : void
    {
        if($this->operation == '3' && $value == 0) {
            $fail("The second number must be greater than 0 because you chose the division operation and We can't divide by zero");
        }
    }
}
