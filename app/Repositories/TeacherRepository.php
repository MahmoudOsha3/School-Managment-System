<?php

namespace App\Repositories ;

use App\Interfaces\TeacherRepositoryInterface ;
use App\Models\Specialization ;
use App\Models\Gender ;
use App\Models\Teacher ;
use Hash ;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
        $teachers = Teacher::latest()->get();
        return view('pages.Teachers.index' , compact('teachers'));
    }

    public function getAllSpecialization()
    {
        return Specialization::all() ;
    }

    public function getAllGender()
    {
        return Gender::all() ;
    }

    public function storeTeacher($request)
    {
        try
        {
            Teacher::create([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'email' => $request->email ,
                'password' => Hash::make($request->password) ,
                'address' => $request->address ,
                'gender_id' => $request->gender_id ,
                'joining_date' =>  $request->joining_date ,
                'specialization_id' => $request->special_id
            ]);
            toastr()->success(trans('site.added'));
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeacher($id)
    {
        try{
            $specializations = $this->getAllSpecialization() ;
            $genders = $this->getAllGender() ;
            $teacher = Teacher::findOrfail($id) ;
            return view('pages.Teachers.edit' , compact('genders' , 'specializations' , 'teacher' ));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => 'Teacher Not found']);
        }
    }

    public function updateTeacher($request , $id)
    {
        try
        {
            $teacher = Teacher::findOrfail($id);
            $teacher->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'email' => $request->email ,
                'password' => Hash::make($request->password) ,
                'address' => $request->address ,
                'gender_id' => $request->gender_id ,
                'joining_date' =>  $request->joining_date ,
                'specialization_id' => $request->special_id
            ]);
            toastr()->success(trans('site.updated'));
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => 'Teacher Not found']);
        }
    }

    public function deleteTeacher($id)
    {
        try
        {
            Teacher::findOrfail($id)->delete() ;
            toastr()->success(trans('site.deleted'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => 'Teacher Not found']);
        }
    }

}





