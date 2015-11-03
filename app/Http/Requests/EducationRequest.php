<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EducationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case    'POST':
            {
                return [
                    'namaPendidikan'        =>  'required|not_in:1',
                    'namaSekolah_kota'      =>  'required',
                    'description'           =>  'required',
                    'start'                 =>  'required|numeric|digits:4',
                    'finish'                =>  'required|numeric|digits:4'
                ];
            }
            case    'PATCH':
            {
                return [
                    'namaSekolah_kota'      =>  'required',
                    'description'           =>  'required',
                    'start'                 =>  'required|numeric|digits:4',
                    'finish'                =>  'required|numeric|digits:4'
                ];
            }
            default:
                break;
        }
        return redirect()->back();

    }
}
