<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this['status'] = $this->status ? true : false;
        

        return [
            'name_tm' => 'required|string',
            'name_ru' => 'required|string',
            'text_tm' => 'required|string',
            'text_ru' => 'required|string',
            'author_tm' => 'required|string',
            'author_ru' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
}
