<?php

namespace App\Repositories ;
use App\Interfaces\SubjectsRepositoryInterface ;
use App\Models\{Grade ,Teacher , Subject } ;



class SubjectsRepository implements SubjectsRepositoryInterface
{
    public function index()
    {
        $subjects = Subject::latest()->get() ;
        $grades = Grade::all() ;
        $teachers = Teacher::all();
        return view('pages.Subjects.index' , compact('subjects' , 'grades' , 'teachers')) ;
    }

    public function store($request)
    {
        try
        {
            $request->validate(['name_en' => 'required' , 'name_ar' => 'required' , 'grade_id' => 'required' , 'class_id' => 'required' , 'section_id' => 'required' , 'teacher_id' => 'required']) ;
            Subject::create([
                'name' => ['ar' => $request->name_ar , 'en' => $request->name_en  ],
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id ,
                'section_id' =>  $request->section_id ,
                'teacher_id' => $request->teacher_id ,
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function update($request , $id)
    {
        try
        {
            $request->validate(['name_en' => 'required' , 'name_ar' => 'required' , 'grade_id' => 'required' , 'class_id' => 'required' , 'section_id' => 'required' , 'teacher_id' => 'required']) ;
            $subject = Subject::findOrfail($id);

            $subject->update([
                'name' => ['ar' => $request->name_ar , 'en' => $request->name_en  ],
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id ,
                'section_id' =>  $request->section_id ,
                'teacher_id' => $request->teacher_id ,
            ]);
            return redirect()->back()->with(['success' => trans('site.updated')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function destroy($id)
    {
        try {
            Subject::findOrfail($id)->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }
}
