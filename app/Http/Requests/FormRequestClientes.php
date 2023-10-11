<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestClientes extends FormRequest
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
        //validamos o method para que ele não entre em GET caso de ser 'GET'
        $request = [];
        if($this->method() == 'POST' || $this->method() == 'PUT'){
            $request = [
                //regras de formularios apenas o nome é obrigatório
                'nome'  => 'required'
            ];
        }

        return $request ;
    }
}
