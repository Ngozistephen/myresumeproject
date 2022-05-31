<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePorfolioRequest extends FormRequest
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
            
                'job_title' => ['required','min:3','string'],
                'project_name' => ['required','min:3','string'],
                'content' => ['required','min:10','string'],
                'startDate' => ['required','date'],
                'endDate' => ['required','date'],
                'skill' => ['required','integer','exists:skills,id'],
                'feature_img' => ['sometimes','nullable','image'],
        
        ];
    }
}
