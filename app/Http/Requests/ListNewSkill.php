<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ListNewSkill extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'namaSkill'     =>  'required|unique:skills'
        ];
    }
}
