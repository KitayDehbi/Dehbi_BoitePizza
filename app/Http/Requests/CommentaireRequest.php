<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
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
            'texte' => 'required|min:10',
            'client_id' => 'required',
            'produit_id' => 'required',
            'date_pub' => 'required'
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
            'texte.required' => 'champ obligatoire',
            'texte.min' => 'ce champ doit contenir au minimum 10 caracteres',
            'client_id' => 'champ obligatoire',
            'produit_id' => 'champ obligatoire',
            'date_pub' => 'champ obligatoire'
        ];
    }
}
