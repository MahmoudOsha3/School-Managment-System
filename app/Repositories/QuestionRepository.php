<?php

namespace App\Repositories ;
use App\Interfaces\QuestionRepositoryInterface ;
use App\Models\{Question , Quizze };



class QuestionRepository implements QuestionRepositoryInterface
{
    public function index()
    {
        $questions = Question::all() ;
        return view('pages.Questions.index' , compact('questions')) ;
    }

    public function create()
    {
        $quizzes = Quizze::latest()->get() ;
        return view('pages.Questions.create' , compact('quizzes')) ;
    }

    public function store($request)
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
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

    public function edit($id)
    {
        $question = Question::findOrfail($id) ;
        $quizzes = Quizze::latest()->get() ;
        return view('pages.Questions.edit' , compact('question','quizzes')) ;
    }

    public function update($request , $id)
    {
        try
        {
            $validate = $request->validate([ 'title' => 'required' ,'answer' => 'required'  ,'right_answer' => 'required' ,'quizze_id' => 'required']) ;
            $question = Question::findOrfail($id);

            $question->update([
                'title' =>  $request->title,
                'answer' => $request->answer ,
                'right_answer' => $request->right_answer ,
                'score' => $request->score ,
                'quizze_id' => $request->quizze_id,
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
