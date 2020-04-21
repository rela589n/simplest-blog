<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AuthorName implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[[:alpha:]]{2,}[[:space:]][[:alpha:]]{2,}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please, enter the name, which contains of two words each one capitalize.';
    }
}
