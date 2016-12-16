<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClimatRequest extends Request
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
            'tmax'  =>  'required|numeric',
            'tmin'  =>  'required|numeric',
            'hmes'  =>  'required|numeric',
            'vmes'  =>  'required|numeric',
            'rs'    =>  'numeric',
            'dinst'    =>  'numeric',
            'krs'   =>  'numeric',
            'zone_id'  => 'required|numeric',
            'date'  => 'required|unique:climats,date_string',
        ];
    }
}
