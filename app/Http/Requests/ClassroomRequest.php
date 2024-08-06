<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'name_ar' => 'required' ,
            'name_en' => 'required',
            'grade_id' => 'required'
        ];
    }

    // customize attrabuite
    public function attributes(): array
    {
        return [
            'name_ar' => trans('site.ar.name'),
            'name_en' => __(key:'site.name_en'),
            'grade_id' => __(key:'site.grade_id') ,
        ];
    }

    // public function message()
    // {
    //     return [
    //         'name_ar.required' => trans('site.name_ar_required'),
    //         'name_en.required' => __(key:'site.name_en_required'),
    //         'grade_id.required' => __(key:'site.grade_id_required')
    //     ];
    // }
}
