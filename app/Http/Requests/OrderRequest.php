<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'karat_price' => ['required', 'numeric', 'min:0'],
            // 'total' => ['required', 'numeric', 'min:0'],
            // 'knet' => ['required', 'numeric', 'min:0'],
            // 'total_knet' => ['required', 'numeric', 'min:0'],
            'product_ids' => ['required', 'array'],
            'product_ids.*' => ['required', 'exists:products,id'],
        ];
    }
}
