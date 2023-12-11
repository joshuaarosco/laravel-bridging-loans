<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = auth()->user();
        return [
            //
            'applicant' => "required",
            'type_id' => "required",
            'oath_1' => "required",
        ];
    }

    public function messages(){
        return [
            'applicant.required' => "Applicant's Name is required",
            'type_id.required' => "Please select a Loan Type",
            'oath_1.required' => "Loan Amount is required",
        ];
    }
}
