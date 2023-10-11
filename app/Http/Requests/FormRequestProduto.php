<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //vem default false , precisamos mudar para true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //validamos o method para que ele não façaem caso de ser 'GET'
        $request = [];
        if($this->method() == 'POST' || $this->method() == 'PUT'){
            $request = [
                //regras de formularios
                'nome'  => 'required',
                'valor' => 'required'
            ];
        }

        return $request ;

    }
}
