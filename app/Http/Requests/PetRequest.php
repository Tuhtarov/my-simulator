<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:1',
            'pet_type_id' => 'required|integer',
            'is_active' => 'boolean',
            'age' => 'integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Кличка питомца обязательна',
            'pet_type_id.required' => 'ID типа питомца обязателен',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => (bool)$this->is_active,
            'age' => (int)$this->age,
            'pet_type_id' => (int)$this->pet_type_id,
            'name' => (string)$this->name
        ]);
    }
}
