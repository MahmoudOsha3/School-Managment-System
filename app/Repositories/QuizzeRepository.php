<?php

namespace App\Repositories ;
use App\Interfaces\QuizzeRepositoryInterface ;
use App\Models\{Quizze , Grade , Teacher , Subject };



class QuizzeRepository implements QuizzeRepositoryInterface
{
    public function index()
    {
        $data['quizzes'] = Quizze::latest()->get() ;
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        $data['subjects'] = Subject::all();
        return view('pages.Quizzes.index' , compact('data')) ;
    }

    public function store($request)
    {
        try
        {
            $validate = $request->validate([ 'title_en' => 'required' ,'title_ar' => 'required'  ,'subject_id' => 'required'  ,'classroom_id' => 'required' ,'section_id' => 'required' ,'grade_id' => 'required' ,'teachers_id' => 'required' ]) ;
            Quizze::create([
                'title' => ['ar' => $request->title_ar , 'en' => $request->title_en  ],
                'subject_id' => $request->subject_id ,
                'classroom_id' => $request->classroom_id ,
                'subject_id' => $request->subject_id ,
                'section_id' => $request->section_id,
                'grade_id' => $request->grade_id ,
                'teacher_id' => $request->teachers_id ,
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
            $validate = $request->validate([ 'title_en' => 'required' ,'title_ar' => 'required'  ,'subject_id' => 'required'  ,'classroom_id' => 'required' ,'section_id' => 'required' ,'grade_id' => 'required' ,'teachers_id' => 'required' ]) ;
            $exam = Quizze::findOrfail($id);

            $exam->update([
                'title' => ['ar' => $request->title_ar , 'en' => $request->title_en  ],
                'subject_id' => $request->subject_id ,
                'classroom_id' => $request->classroom_id ,
                'subject_id' => $request->subject_id ,
                'section_id' => $request->section_id,
                'grade_id' => $request->grade_id ,
                'teacher_id' => $request->teachers_id ,
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
            Quizze::findOrfail($id)->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }
}
