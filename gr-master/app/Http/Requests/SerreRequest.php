<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SerreRequest extends Request
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
        return [
            'name'          => 'required',
            'type'          => 'required',
            'zone_id'       => 'required',
            'envirenement'  => 'required',
            'nbr'           => 'required|numeric|min:1',
            'c'             => 'required|numeric',
            'w'             => 'required|numeric',
            'l'             => 'required|numeric',
            'h'             => 'required|numeric',
            'e'             => 'required|numeric',
            'd'             => 'required|numeric',
            'ctz'           => 'required',
            'tc'            => 'required',
        ];
    }
}
