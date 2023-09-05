<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        // $id = $this->route('category');
        return [
            'name_ar'=>'required','string','max:255',
            'name_en'=>'required','string','max:255',
            'description_ar'=>'required','string',
            'description_en'=>'required','string',
            'image'=>'image',
            'status'=>'in:active,archived'
        ];
    }
}
