<?php

namespace App\Http\Requests\MasterData\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'nama' => ['required', 'string', 'regex:/^[^*&$()#{}]+$/'],
            'no_tlp' => ['required', 'numeric', 'regex:/^[^*&$()#{}]+$/'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => "Nama Customer",
            'no_tlp' => "No Tlp Customer",
        ];
    }
}
