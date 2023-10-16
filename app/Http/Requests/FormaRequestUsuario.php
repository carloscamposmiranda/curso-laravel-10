<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormaRequestUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        $request = [];
        if($this->method() == "POST" || $this->method() == "PUT"){
            return [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
              ];
        }
        return $request; 
    }
}
