<?php

namespace App\Http\Controllers\Classroom ;
use App\Http\Controllers\Controller ;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;


class ClassroomController extends Controller
{

    public function index(Request $request)
    {
        try{
            if (isset($request->grade_id)){
                $grades = Grade::all();
                $classrooms = Classroom::select('*')->where('grade_id' , $request->grade_id)->get();
            }else{
                $classrooms = Classroom::all() ;
                $grades = Grade::all() ;
            }
            return view('pages.Classroom.index' , compact('classrooms' , 'grades'));

        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]) ;
        }
    }

    public function store(ClassroomRequest $request)
    {
        try{
            $validated = $request->validated();
            Classroom::create([
                'name' => [
                    'en' => $request->name_en ,
                    'ar' => $request->name_ar
                ],
                'grade_id' => $request->grade_id
            ]);
            toastr()->success(trans('site.added')) ;
            return redirect()->back();
        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }
    }

    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        try {
            $validate = $request->validated() ;
            if(isset($classroom)){
                $classroom->update([
                    'name' => [
                        'en' => $request->name_en ,
                        'ar' => $request->name_ar
                    ],
                    'grade_id' => $request->grade_id
                ]);
                toastr()->success(__('site.updated'));
                return redirect()->back();
            }else{
                return redirect()->back()->with(['success' => 'الفصل غير موجود']);
            }

        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }

    }

    public function destroy(Classroom $classroom)
    {
        try{
            if (isset($classroom)) {
                $classroom->delete();
                toastr()->success(trans('site.deleted')) ;
                return redirect()->back();
            }else{
                return redirect()->back()->with(['success' => 'الفصل غير موجود']);
            }

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }

    }

    public function delete_all(Request $request)
    {
        try{
            $all_id = explode(',' , $request->delete_all_id) ;
            Classroom::whereIn('id' , $all_id )->delete() ;
            toastr()->success(trans('site.deleted')) ;
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' =>  $e->getMessage() ]);
        }
    }



}
