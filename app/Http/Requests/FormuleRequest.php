<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FormuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imgPath' => "required",
            'description' => 'required|min:10',
            'prix' => 'required|numeric|min:20',
            'nom' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'imgPath.required' => ' une image est obligatoire',
            'nom.required' => 'le nom de la formule est obligatoire',
            'prix.required' => 'le prix est obligatoire',
            'prix.min' => 'le prix doit etre > 20 DH',
            'description.required' => ' la description est obligatoire',
            'description.min' => ' description doit contenir au minimum 10 caracteres',
            
        ];
    }
}
