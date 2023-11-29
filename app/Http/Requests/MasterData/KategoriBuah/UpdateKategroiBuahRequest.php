<?php

namespace App\Http\Requests\MasterData\KategoriBuah;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategroiBuahRequest extends FormRequest
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
        $attr = $this->attributes();

        return [
            'buah' => ['required', 'string', 'regex:/^[^*&$()#{}]+$/'],
        ];
    }

    public function attributes()
    {
        return [
            'buah' => "Nama Buah",
        ];
    }
}
