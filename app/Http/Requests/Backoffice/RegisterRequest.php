<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $user = auth()->user();
        return [
            //
            'fname' => "required",
            'lname' => "required",
            'contact_number' => "required",
            'email' => "required|unique:users,email",
            'password' => "confirmed|min:8",
            'password_confirmation' => "required",
            'bc' => "required",
            'id' => "required",
            'coe' => "required",
            'lp' => "required",
            'fee' => "required",
        ];
    }

    public function messages(){
        return [
            'bc.required' => "Please upload a copy of your Birth Certificate.",
            'id.required' => 'Please upload a 2"x2" ID picture.',
            'coe.required' => "Please upload your COE.",
            'lp.required' => "Please upload a copy of your Latest Payslip.",
            'fee.required' => "Please attach the successful payment screenshot.",
        ];
    }
}
