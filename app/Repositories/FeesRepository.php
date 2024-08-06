<?php

namespace App\Repositories ;

use App\Interfaces\FeesRepositoryInterface ;
use App\Models\{Fee , Grade , Classroom };

class FeesRepository implements FeesRepositoryInterface
{
    public function index()
    {
        $grades = Grade::all() ;
        $classrooms = Classroom::all() ;
        $fees = Fee::all() ;
        return view('pages.Fees.index' , compact('grades' , 'classrooms' , 'fees')) ;
    }

    public function store($request)
    {
        try
        {
            $valiadate = $request->validate(['name_ar' => 'required','name_en'=>'required' , 'amount' => 'required','grade_id' => 'required' , 'classroom_id' => 'required' , 'year'=>'required']);
            Fee::create([
                'title' => ['en' => $request->name_en  , 'ar' => $request->name_ar],
                'amount' => $request->amount ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'year' => $request->year ,
            ]);
            return redirect()->back()->with(['success' => trans('site.added')]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update($request , $id )
    {
        try
        {
            $valiadate = $request->validate(['name_ar' => 'required','name_en'=>'required' , 'amount' => 'required','grade_id' => 'required' , 'classroom_id' => 'required' , 'year'=>'required']);
            $fee = Fee::findOrfail($id) ;
            $fee->update([
                'title' => ['en' => $request->name_en  , 'ar' => $request->name_ar],
                'amount' => $request->amount ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classroom_id ,
                'year' => $request->year ,
            ]);
            return redirect()->back()->with(['success' => trans('site.updated')]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function deleted($id)
    {
        try{
            $fee = Fee::findOrfail($id) ;
            $fee->delete();
            return redirect()->back()->with(['success' => trans('site.deleted')]);
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


}
