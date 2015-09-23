<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SosmedRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'email'     =>  'required|email|unique:sosmed',
                    'facebook'  =>  'required|unique:sosmed',
                    'twitter'   =>  'required|unique:sosmed',
                    'linkedin'  =>  'required|unique:sosmed',
                    'skype'     =>  'required|unique:sosmed'
                ];
            }

            case 'PATCH':
            {
                return [
                    'email'     =>  'required',
                    'facebook'  =>  'required',
                    'twitter'   =>  'required',
                    'linkedin'  =>  'required',
                    'skype'     =>  'required'
                ];
            }
            default:
                break;
        }
        return redirect(url(action('ProfileController@index')));
    }
}
