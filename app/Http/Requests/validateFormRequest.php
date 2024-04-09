<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required ",
            "mobile"=>"required | integer | min: 5 | max: 10",
            
        ];
    }

    public function messages(){
        return [
            "name.required"=>"Le champ name est requis!",
            "mobile.required"=>"Le champ mobile est requis!",
            "mobile.min"=>"Le minimun requis pour mobile est 5 !",
            "mobile.max"=>"Le maximun requis pour mobile est 10 !",


        ];
    }
}
