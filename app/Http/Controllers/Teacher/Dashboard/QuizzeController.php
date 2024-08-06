<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Quizze , Grade , Classroom , Sections , Subject , Question , ReportDegreeQuizze } ;
class QuizzeController extends Controller
{

    public function index()
    {
        $quizzes = Quizze::where('teacher_id' , auth()->user()->id)->get();
        $grades = Grade::all() ;
        $subjects = Subject::where('teacher_id' , auth()->user()->id)->get() ;
        return view('pages.Teachers.dashboard.Quizze.index' , compact('quizzes' , 'grades' , 'subjects')) ;
    }

    public function store(Request $request)
    {
        try
        {
            $validate = $request->validate(['title_en' => 'required' , 'title_ar' => 'required' , 'grade_id' => 'required' , 'classroom_id' => 'required' ,'section_id' => 'required' , 'subject_id' => 'required']);
            Quizze::create([
                'title' => ['en' => $request->title_en , 'ar' => $request->title_ar] ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'section_id' => $request->section_id ,
                'subject_id' => $request->subject_id ,
                'teacher_id' => auth()->user()->id
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    // عرض الاسئلة الخاصة ب الاختبار
    public function show($quizze_id)
    {
        $questions = Question::where('quizze_id' , $quizze_id)->get() ;
        $quizze = Quizze::findorfail($quizze_id) ;
        return view('pages.Teachers.dashboard.Questions.index' , compact('questions' , 'quizze')) ;
    }


    public function update(Request $request, $quizze_id)
    {
        try
        {
            $validate = $request->validate(['title_en' => 'required' , 'title_ar' => 'required' , 'grade_id' => 'required' , 'classroom_id' => 'required' ,'section_id' => 'required' , 'subjects_id' => 'required']);
            $quizze = Quizze::findorfail($quizze_id) ;
            $quizze->update([
                'title' => ['en' => $request->title_en , 'ar' => $request->title_ar] ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'section_id' => $request->section_id ,
                'subject_id' => $request->subjects_id ,
                'teacher_id' => auth()->user()->id
            ]);
            return redirect()->back()->with(['success' => trans('site.updated')]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            Quizze::findorfail($id)->delete() ;
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function reportQuizze($quizze_id)
    {
        try
        {
            $quizze = Quizze::findorfail($quizze_id) ;
            $reports = ReportDegreeQuizze::where('quizze_id' , $quizze_id)->get();
            return view('pages.Teachers.dashboard.Quizze.report' , compact('reports' , 'quizze')) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }



    // for ajax code fetch data of classroom using grades
    public function getClasses($grade_id)
    {
        $classroom = Classroom::where('grade_id' , $grade_id )->pluck('name' , 'id') ;
        return $classroom ;
    }

    // for ajax code fetch data of classroom using grades
    public function getSection($classroom_id)
    {
        $sections = Sections::where('classroom_id' , $classroom_id )->pluck('name' , 'id') ;
        return $sections ;
    }

    // for ajax code fetch data of subject using section and teacher
    // كل مدرس لي مادة بيدرسها و مع فصل معين ف هنا بجيب المادة اللي المعلم بيدرسها في فصل أ مثلا
    public function getSubject($section_id)
    {
        $subjects = Subject::where(['section_id' => $section_id , 'teacher_id' => auth()->user()->id ])->pluck('name' , 'id');
        return $subjects ;
    }


}
