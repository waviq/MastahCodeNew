<?php

namespace App\Http\Requests;


use App\Http\Requests\Request;
use App\Kategori;


class KategoriRequest extends Request {

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
        //$kategoris = Kategori::find($this->kategori);

        switch ($this->method())
        {
            case 'POST':
            {
                return [
                    'namaKategori' => 'required|unique:kategori,namaKategori',
                    'image'        => 'mimes:jpeg,png|max:1000px'
                ];
            }

            case 'PATCH':
            {
                return [
                    'namaKategori'   => 'required|unique:kategori,namaKategori',
                    'image'        => 'mimes:jpeg,png|max:1000px'
                ];
            }
            default:
                break;
        }

    }
}
