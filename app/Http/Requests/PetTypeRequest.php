<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetTypeRequest extends FormRequest
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
            'image_id' => 'required|integer',
            'age_max' => 'required|integer',
            'growth_factor' => 'required|integer',
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
            // торопился
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
            'name' => (string)$this->name,
            'image_id' => (int)$this->image_id,
            'age_max' => (int)$this->age_max,
            'growth_factor' => (int)$this->growth_factor
        ]);
    }
}
