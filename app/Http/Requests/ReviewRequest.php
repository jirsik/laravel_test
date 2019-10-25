<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review' => 'required|max:250',
            'rating' => 'required|integer|min:0|max:10',
        ];
    }

    public function messages()
    {
        return [
                'review.required' => 'fill this!!!!!',
                'review.max' => 'it is too long and boring',
                'rating.min' => 'give it at least 0 please'
            ];
    }
}
