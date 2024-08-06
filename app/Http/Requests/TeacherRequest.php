<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name_en' => 'required|min:7' ,
            'name_ar' => 'required|min:7' ,
            'email' => 'required|unique:teachers,email,'.$this->route('teacher'),
            'password' => 'required|min:9',
            'address' => 'required|min:7',
            'joining_date' => 'required|date',
            'gender_id' => 'required',
            'special_id' => 'required'
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'name_en'
    //     ];
    // }
}
