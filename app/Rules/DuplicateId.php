<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DuplicateId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $present = DB::table('users')->find($value);

        if($present) $fail('Please Enter a Unique ID  ');
    }
}
