<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'firstname'     =>'required',   
            'lastname'      =>'required',  
            'tel'           =>'required',       
            'email'         =>'required',     
            'address'       =>'required',  
            'amphure_id'     =>'required',
            'province_id'   =>'required', 
            'zipcode'       =>'required',      
            'password'      =>'required'
        ];
    }
}
