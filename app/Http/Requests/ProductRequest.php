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
            'name' => 'required',
            'brend_id' => 'required',
            'cat_id' => 'required',
            'cap_id' => 'required',
            'price' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Введите название товара...',
            'brend_id.required' => 'Бренд не выбран...',
            'cat_id.required' => 'Категория не выбрана...',
            'cap_id.required' => 'Объем не выбран...',
            'price.required' => 'Введите цену...'
        ];
    }    


}
