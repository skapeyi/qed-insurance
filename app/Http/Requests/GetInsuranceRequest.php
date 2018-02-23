<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetInsuranceRequest extends FormRequest
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
            'address' => 'required',
            'chasis_no' => 'required',
            'color' => 'required',
            'cubic_capacity' => 'required',
            'engine_no' => 'required',
            'insurance_period_start' => 'required',
            'insurance_period_end' => 'required',
            'make' => 'required',
            'name' => 'required',
            'reg_number' => 'required',
            'reg_owner' => 'required',
            'seating_capacity' => 'required',
            'third_party_property_damage' => 'required',
            'tonnage' => 'numeric|required',
            'use' => 'required',
            'year_of_manufacture' => 'required'
        ];
    }
}
