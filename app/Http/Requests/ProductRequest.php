<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'department_id' => ['required', 'exists:departments,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'karat_id' => ['required', 'exists:karats,id'],
            'weight' => ['required', 'numeric', 'min:0'],
            'effort_price' => ['required', 'numeric', 'min:0'],
            'stone_price' => ['required', 'numeric', 'min:0'],
            'stone_weight' => ['required', 'numeric', 'min:0'],
            'image_url' => ['required', 'string','max:2000'],
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ];
    }
}
