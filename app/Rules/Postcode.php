<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Postcode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        return $this->apiRequest($value);
    }

    /**
     *
     * @param $url
     * @return mixed
     */
    public function apiRequest($code)
    {
        $url = 'api.postcodes.io/postcodes/' . $code . '/validate';
        $response = Http::get($url);
        return json_decode($response->body())->result;
    }
    /**/
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The postcode is not a valid UK postcode';
    }
}
