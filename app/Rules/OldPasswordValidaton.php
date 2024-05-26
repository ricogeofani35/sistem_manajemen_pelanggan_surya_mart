<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class OldPasswordValidaton implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id_user = auth()->user()->id;
        $data_user = User::where('id', $id_user)->first();

        // cek old password
        if(!Hash::check($value, $data_user->password)) {
            $fail('old password failed!');
        }
    }
}
