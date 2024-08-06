<?php

namespace App\Repositories ;
use App\Interfaces\ExamsRepositoryInterface ;
use App\Models\Exam;



class ExamsRepository implements ExamsRepositoryInterface
{
    public function index()
    {
        $exams = Exam::latest()->get() ;
        return view('pages.Exams.index' , compact('exams')) ;
    }

    public function store($request)
    {
        try
        {
            $validate = $request->validate([ 'title_en' => 'required' ,'title_ar' => 'required'  ,'term' => 'required' ,'acdemic_year' => 'required' ]) ;
            Exam::create([
                'title' => ['ar' => $request->title_ar , 'en' => $request->title_en  ],
                'term' => $request->term ,
                'acadmeic_year' => $request->acdemic_year ,
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
            $request->validate(['title_en' => 'required' , 'title_ar' => 'required'  , 'term' => 'required' , 'acdemic_year' => 'required']) ;
            $exam = Exam::findOrfail($id);

            $exam->update([
                'title' => ['ar' => $request->title_ar , 'en' => $request->title_en  ],
                'term' => $request->term ,
                'acadmeic_year' => $request->acdemic_year ,
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
            Exam::findOrfail($id)->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }
}
