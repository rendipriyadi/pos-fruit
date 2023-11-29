<?php

namespace App\Http\Requests\MasterData\ItemBuah;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemBuahRequest extends FormRequest
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
            'unit' => ['required', 'string', 'regex:/^[^*&$()#{}]+$/'],
            'harga' => ['required', 'string', 'regex:/^[^*&$()#{}]+$/'],
            'kategori_buah_id' => ['required', 'string', 'regex:/^[^*&$()#{}]+$/']
        ];
    }

    public function attributes()
    {
        return [
            'nama' => "Item Buah",
            'unit' => "Unit Buah",
            'harga' => "Harga Buah",
            'kategori_buah_id' => "Kategori Buah"
        ];
    }
}
