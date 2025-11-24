<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'FirstName'=> ['required','string','min:3','max:50'],
            'LastName'=>['required','string','min:3','max:50'],
            'Email'=>['required','email','unique:users,email'],
            'Password'=>['required','string','min:8'],
            'Phone'=>['required','string','min:11','max:15'],
            'Avatar'=>['nullable','image','string','mimes:jpeg,png,jpg,gif,svg','max:5000'],
            'is_admin'=>['nullable','boolean','default'=>false],
        ];
    }
}
