<?php

namespace App\Modules\CarManagement\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand' => 'required|',
            'model' => 'required|',
            'year' => 'required|'
        ];
    }
    public function messages()
    {
        return [
            'brand.required' => 'Informe uma marca válida!',
            'model.required' => 'Informe um modelo válido!',
            'year.required' => 'Informe um ano válido!'
        ];
    }
}
