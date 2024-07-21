<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Kiểm tra định dạng số điện thoại, ví dụ: 10 chữ số
        return preg_match('/^[0-9]{10}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid phone number.';
    }
}
