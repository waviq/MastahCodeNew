<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlogRequest extends Request
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
            case 'POST':
            {
                return [
                    'judul' => 'required|unique:posts',
                    'kontenFull' => 'required|min:20',
                    'kategori_list' => 'required',
                    'image'        => 'mimes:jpeg,png|max:1000px'
                ];
            }
            case 'PATCH':
            {
                return [
                    'kontenFull' => 'required|min:20',
                    'kategori_list' => 'required',
                    'image'        => 'mimes:jpeg,png|max:1000px'
                ];
            }
            default:
                break;
        }
        return redirect()->back();

    }
}
