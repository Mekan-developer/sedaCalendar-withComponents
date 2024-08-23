<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioPoemRequest extends FormRequest
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
        $data = [
            'name_tm' => 'required|string',
            'name_ru' => 'required|string',
            'audio' => 'nullable|mimes:mp3|max:10240',//10Mb
            'status' => 'required|boolean',
        ];

        if($this->isMethod("post")){
            $data['audio'] = 'required|mimes:mp3|max:10240';
        }
        return $data;
    }
}
