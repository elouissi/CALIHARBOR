<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExercises_DetailsRequest extends FormRequest
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
            'kcal' => 'required',
            'repetition' => 'integer',
            'duree' => 'integer',
        ];
    }
    
    public function messages(): array
{
    return [
        'repetition.prohibited_if' => 'You cannot fill both repetition and duree fields at the same time.',
        'duree.prohibited_if' => 'You cannot fill both duree and repetition fields at the same time.',
    ];
}

}   
