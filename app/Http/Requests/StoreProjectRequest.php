<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:150|unique:projects',
            'content' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo deve essere presente',
            'title.max' => 'Il titolo può essere lungo al massimo 150 caratteri',
            'title.unique' => 'Il titolo del progetto è gia presente nel database',
            'content.required' => 'Il contenuto del progetto deve essere presente'
        ];
    }
}
