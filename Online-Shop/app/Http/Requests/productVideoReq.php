<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productVideoReq extends FormRequest
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
            'product_id' => ['required','integer'],
            'video_path' => ['nullable','file','mimetypes:video/mp4,video/avi','max:5000'],
        ];
    }
}
