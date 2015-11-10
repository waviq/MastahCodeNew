<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestTutorialRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'         =>  'required',
            'description'   =>  'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
