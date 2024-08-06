<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name_ar' => 'required|min:8',
            'name_en' => 'required|min:8',
            'email' => 'required|email|unique:students,email,'.$this->route('student') ,
            'password' => 'required|min:8',
            'academic_year' => 'required',
            'date_birth' => 'required|date',
            'grade_id' => 'required|numeric',
            'classroom_id' => 'required|numeric',
            'section_id' => 'required|numeric',
            'nationalitie_id' => 'required|numeric',
            'blood_id' => 'required|numeric',
            'gender_id' => 'required|numeric',
            'parent_id' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name_ar' => __(key:'site.name_ar') ,
            'name_en' => __(key:'site.name_en') ,
            'email' => __(key:'site.email') ,
            'password' => __(key:'site.password') ,
            'academic_year' => trans('student.academic_year') ,
            'date_birth' => trans('student.Date_of_Birth') ,
            'grade_id' => trans('site.grade_id'),
            'classroom_id' => trans('site.classroom_id') ,
            'section_id' => trans('site.section') ,
            'nationalitie_id' => trans('student.nationality'),
            'blood_id' => trans('parent.Blood_Type_Father_id'),
            'gender_id' => trans('site.gender') ,
            'parent_id' => trans('site.parent')

        ];

    }
}
