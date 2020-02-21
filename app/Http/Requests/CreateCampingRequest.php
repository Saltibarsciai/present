<?php

namespace App\Http\Requests;

use App\Exceptions\CreateCampingException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateCampingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'country' => 'required|min:4|max:20',
            'city' => 'required|min:4|max:20',
            'name' => 'required|min:4|max:20',
            'link' => 'required',
        ];
    }

    /**
     * @param Validator $validator
     * @throws CreateCampingException
     */
    public function failedValidation(Validator $validator)
    {
        throw new CreateCampingException();
    }
}
