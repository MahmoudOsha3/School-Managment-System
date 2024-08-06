<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Quizze , Question } ;
class QuestionController extends Controller
{

    // create question using quizze id
    public function show($quizze_id)
    {
        try
        {
            $quizze = Quizze::findorfail($quizze_id) ;
            return view('pages.Teachers.dashboard.Questions.create' , compact('quizze')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'answer' => 'required'  ,'right_answer' => 'required' ,'quizze_id' => 'required']) ;
            Question::create([
                'title' =>  $request->title,
                'answer' => $request->answer ,
                'right_answer' => $request->right_answer ,
                'score' => $request->score ,
                'quizze_id' => $request->quizze_id,
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($question_id)
    {
        $question = Question::findOrfail($question_id) ;
        return view('pages.Teachers.dashboard.Questions.edit' , compact('question')) ;
    }


    public function update(Request $request, $id)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'answer' => 'required'  ,'right_answer' => 'required']) ;
            $question = Question::findOrfail($id);

            $question->update([
                'title' =>  $request->title,
                'answer' => $request->answer,
                'right_answer' => $request->right_answer ,
                'score' => $request->score ,
                'quizze_id' => $question->quizze_id ,
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
            Question::findOrfail($id)->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }
}
