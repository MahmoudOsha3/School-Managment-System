<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Student , Grade} ;

class GraduatedController extends Controller
{

    public function index()
    {
        $students =  Student::onlyTrashed()->get() ;
        return view('pages.Students.graduates.index' , compact('students')) ;
    }


    public function create()
    {
        $grades = Grade::all() ;
        return view('pages.Students.graduates.addNewGraduateStudent' , compact('grades'));
    }


    // softDelete for students to make your graduation 
    public function store(Request $request)
    {
        // $students = Student::where()
        $students = Student::where([
            ['grade_id' , $request->grade_id] ,
            ['classroom_id' , $request->classroom_id] ,
            ['section_id' , $request->section_id] ,
            ['academic_year' , $request->academic_year] ,
        ])->get();
        
        if($students->count() <= 0 ){
            return redirect()->back()->with(['error' => __(key:'student.not_stu_grad')]);
        }

        // updated all student to deleted using softDelete()
        foreach ($students as $student) {
            $student_id = explode(',' , $student->id) ;
            // not delete from database but add in column deleted_at time deleted (this softDelete) become student graduate but i have your data
            Student::whereIn('id' , $student_id)->delete() ; 
        }
        toastr()->success(trans('site.updated'));
        return redirect()->route('graduates.index') ;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    // return student from graduation 
    public function update(Request $request, $id)
    {
        $student = Student::onlyTrashed()->where('id' , $id)->first();
        if(! $student){
            return redirect()->back()->with(['error' => trans('student.not_stu_grad')]);
        }
        // if student is exist in graduation => means column deleted_at is not null => restore means make column is null
        $student->restore() ;
        toastr()->success(trans('student.updated_graduated'));
        return redirect()->back();
    }

    // deleted student from database 
    public function destroy($id)
    {
        try{
            Student::onlyTrashed()->where('id' , $id)->first()->forceDelete() ;
            toastr()->success(trans('site.deleted'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage() ]);
        }
    }
}
