<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(is_numeric($this->image)) {
            $validation = 'digit';
        } else if (!filter_var($this->image, FILTER_VALIDATE_URL) === false) {
            $validation = 'url';
        } else {
            $validation = 'file';
        }

        return [
            'title' => 'required|max:160',
            'description' => 'required|max:255',
            'instructions' => 'required|max:10000',
            'image' => "required|{$validation}",// 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preparation_time' => 'integer',
            'difficulty_level' => 'string',
            'other_details' => 'string'
        ];
    }
}
