<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnswerStoreRequest extends FormRequest
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
            'answer' => 'required',
            'forum_id' => 'required | exists:forums,id' 
        ];
    }

    public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json($validator->errors(),
       422));
    }
   
}
