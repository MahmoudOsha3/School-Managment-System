<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller ;
use App\Models\Sections;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Http\Requests\SectionsRequest;
use Illuminate\Http\Request;
use DB ;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $teachers = Teacher::all() ;
        $list_grades = Grade::all() ;
        return view('pages.sections.index',compact('list_grades','grades' , 'teachers'));

    }

    // function of ajax for get class of each grade
    public function getClasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }


    public function store(SectionsRequest $request)
    {
        try{
            $validated = $request->validated() ;
            $sections = Sections::create([
                'name' => ['en'=>$request->section_en , 'ar' => $request->section_ar],
                'status' => true ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id
            ]);
            // relationship (many to many) for store teachers belongs many sections
            $sections->teachers()->attach($request->teacher_id);
            toastr()->success(__(key:'site.added'));
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function update(SectionsRequest $request)
    {
        try{
            $validated = $request->validated() ;
            $section = Sections::findOrfail($request->id) ;
            $section->update([
                'name' => ['ar' => $request->section_ar , 'en' => $request->section_en ],
                'status' => $request->status ,
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->class_id,
            ]);
            $section->teachers()->sync($request->teacher_id) ;
            toastr()->success(trans('site.updated'));
            return redirect()->back();


        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request , $id)
    {
        try{
            Sections::findOrfail($id)->delete() ;
            toastr()->success(trans('site.deleted'));
            return redirect()->back() ;

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
