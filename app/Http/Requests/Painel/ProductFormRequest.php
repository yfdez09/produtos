<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        'name' => 'required|min:3|max:100',
        'number' => 'required|numeric',
        'category' => 'required',
        'description' => 'max:1000',     
        ];        
    }
    
    public function messages(){
        
        return $message = [
          'name.required' => 'O campo nome é de preenchimento obrigatorio',
          'name.min' => 'O campo nome deve ter um minimo de 3 caracteres',
          'number.numeric' => 'O campo number precisa ser apenas números',
          'number.required' => 'O campo número é de preenchimento obrigatorio',
          'category.required' => 'O campo categoria é de preenchimento obrigatorio',            
        ];
    }
}
