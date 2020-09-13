<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasteRequest extends FormRequest
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
        'paste' => 'required|min:5',
        'id_expiration' => 'required|integer',
        'id_syntax' => 'required|integer',
        'exposure' => 'required|integer|digits_between:1,3',
        'name' => 'required|min:5|max:50'
      ];
    }
}
