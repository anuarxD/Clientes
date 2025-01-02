<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        return [
			'usuario_id' => 'required',
			'fecha_nacimiento' => 'required',
			'genero' => 'required',
			'direccion' => 'string',
			'telefono' => 'string',
			'tutor_nombre' => 'string',
			'tutor_relacion' => 'string',
			'tutor_telefono' => 'string',
			'historial_medico' => 'string',
			'alergias' => 'string',
        ];
    }
}
