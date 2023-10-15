<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestVendas extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if($this->method() == "POST" || $this->method() == "PUT"){
            return [
                'produto_id' => 'required',
                'cliente_id' => 'required',
              ];
        }
        return $request;  
    }
}
