<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'section_ar' => 'required' ,
            'section_en' => 'required' ,
            'grade_id' => 'required',
            'class_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'section_ar' => trans('site.section_ar'),
            'section_en' => trans('site.section_en'),
            'grade_id' => trans('site.grade_id'),
            'class_id' => trans('site.classroom_id'),
        ];
    }
}
