<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
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
        $rule = Rule::unique('posts');
        if(request()->route('post')){
            $rule = $rule->ignore(request()->route('post'));
        }

        return [
            'title' => ['required', 'max:255', $rule],
            'body' => ['required'],
            'image.*' => 'image'
        ];
    }
}
