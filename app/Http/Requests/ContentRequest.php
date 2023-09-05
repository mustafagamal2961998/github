<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_ar'=>'required','string','max:255',
            'title_en'=>'required','string','max:255',
            'content_ar'=>'required','string',
            'content_en'=>'required','string',
            'status'=>'in:active,archived'
        ];
    }
}
