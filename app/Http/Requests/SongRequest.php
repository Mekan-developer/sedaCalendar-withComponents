<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'audio' => 'required|max:10240',
            'status' => 'required|boolean',
        ];
    }
}
