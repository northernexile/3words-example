<?php

namespace App\Http\Requests;

use Axiom\Rules\LocationCoordinates;
use Illuminate\Foundation\Http\FormRequest;

class CreateGeoThreeWordsRequest extends FormRequest
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
            'latitude'=>['sometimes','required'],
            'longitude'=>['sometimes','required'],
            'three_words'=>['sometimes','required']
        ];
    }
}
