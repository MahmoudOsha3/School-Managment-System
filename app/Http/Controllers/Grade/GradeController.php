<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller ;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;

class GradeController extends Controller
{

    public function index()
    {
        $grades = Grade::all() ;
        return view('pages.grades.index', compact('grades')) ;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // if(Grade::where('name->ar' , $request->name_ar)->orWhere('name->en' , $request->name_en)->exists()){
        //     return redirect()->back()->withErrors(trans('site.name_required' )) ;
        // }
        try{
            $validate = $request->validate([
                'name_en' => 'required',
                'name_ar' => 'required',
            ],[
                'name_en' => 'الاسم باللغة الانجليزية مطلوب',
                'name_ar' => 'الاسم باللغة العربية مطلوب'
            ]);
            Grade::create([
                'name' => [
                    'en' => $request->name_en ,
                    'ar' => $request->name_ar

                    ] ,
                'notes' => $request->notes
            ]);
            toastr()->success(trans('site.added')) ;
            return redirect()->back();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            $grade = Grade::find($id) ;
            $grade->update([
                'name' => ['en'=>$request->name_en , 'ar'=>$request->name_ar],
                'notes' => $request->notes
            ]);
            toastr()->success(trans('site.updated')) ;
            return redirect()->back();

        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }
    }

    public function destroy( $id )
    {
        $grade = Grade::findorfail($id)->delete() ;
        toastr()->success(trans('site.deleted')) ;
        return redirect()->back();
    }
}
