<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'nullable|digits:13',
            'date_of_birth' => 'required',
            'home_address' => 'required',
            'email' => 'nullable|email', // check unique, check update create
            'phone' => ['required','regex:/^(\+27|0)[6-8][0-9]{8}$/'],
            'school_id' => 'required' 
        ];
    }
}
/*
'reference' => 'required|digits:8',
'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
'store_location' => 'required',

'client_name' => 'required|max:100',
'client_phone' => ['required','regex:/^(\+27|0)[6-8][0-9]{8}$/'], //use array to avoid ending delimiter error

'vin' => 'required|alpha_num|min:17|max:17',
'make' => 'required|max:50',
'model' => 'required|max:50',
'year' => "required|date_format:Y",
'registration' => 'required',
'license_issue_date' => 'required|date|date_format:Ymd',
'license_expiry_date' => 'required|date|date_format:Ymd|gt:license_issue_date|after:today', */
