<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'         => ['required','min:3'],
            'slug'          => (!$this->id) ? ['required','unique:posts'] : ['unique:posts,slug,'.$this->id],
            'content'       => ['required'],
        ];
    }
    
    public function messages()
    {
        return [
            'title.required'        => 'Campo obligatorio',
            'title.min'             => 'Mínimo 3 valores',
            'slug.required'         => 'Campo obligatorio',
            'slug.unique'           => 'Este valor ya existe',
            'content.required'      => 'Campo obligatorio',
        ];
    }
}
