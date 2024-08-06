<?php

namespace App\Repositories ;
use App\Interfaces\PromotionStudentRepositoryInterface ;
use App\Models\{Grade , Student , Promotion } ;
use DB ;

class PromotionStudentRepository implements PromotionStudentRepositoryInterface
{
    public function index()
    {
        $grades = Grade::all() ;
        return view('pages.Students.promotion.index' , compact('grades'));
    }

    public function storePromotion($request)
    {
        DB::beginTransaction();
        try{
            // where AND
            $students = Student::where([
                ['grade_id' , $request->grade_id],
                ['classroom_id' , $request->classroom_id] ,
                ['section_id' , $request->section_id] ,
                ['academic_year' , $request->academic_year]
                ])->get();

            if($students->count() < 0)
                return redirect()->back()->with(['error_promotions' => __(key:'student.not_found_student')]);

            foreach ($students as $student)
            {
                // convert to array
                $idStudnet = explode(',' , $student->id) ; // [ 1 , 2 , 3 , ... ]
                Student::whereIn('id' , $idStudnet)->update([
                    'grade_id' => $request->grade_id_new ,
                    'classroom_id' => $request->classroom_id_new ,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_new
                ]);

        //         // store => promotion table => if promotion is exists (update only) , if promotion new => created
                Promotion::updateOrcreate([
                    'student_id' => $student->id ,
                    'from_grade' => $student->grade_id ,
                    'from_classroom' => $student->classroom_id ,
                    'from_section' => $student->section_id ,
                    'to_grade' => $request->grade_id_new,
                    'to_classroom' => $request->classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'acadmic_year' => $request->academic_year,
                    'new_acadmic_year' => $request->academic_year_new

                ]);
            }

            DB::commit();
            toastr()->success(trans('site.updated'));
            return redirect()->route('students.index');
        }
        catch(\Exception $e)
        {
            DB::rollback() ;
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }

    }


    // updated student level and deleted all promotions
    public function returnAllPromotions()
    {
        DB::beginTransaction();
        try
        {
            // update all students then delete all promotions
            $promotions = Promotion::all();

            if($promotions->count() <= 0){
                return redirect()->back()->with(['error' => trans('student.no_promotion') ]);
            }
            foreach ($promotions as $promotion)
            {
                $student_id = explode(',' , $promotion->student_id) ;
                Student::whereIn('id' , $student_id)->update([
                    'grade_id' => $promotion->from_grade , // from grade that previous
                    'classroom_id' => $promotion->from_classroom ,
                    'section_id' => $promotion->from_section ,
                    'academic_year' => $promotion->acadmic_year
                ]);
            }
            // delete all promotions
            Promotion::truncate() ;

            DB::commit() ;
            toastr()->success(trans('site.updated'));
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            DB::rollback() ;
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function returnPromotionStudent($promotion_id)
    {
        DB::beginTransaction();
        try
        {
            $promotion = Promotion::findOrfail($promotion_id) ;
            Student::where('id' , $promotion->student_id)->update([
                'grade_id' => $promotion->from_grade ,
                'classroom_id' => $promotion->from_classroom ,
                'section_id' => $promotion->from_section
            ]);

            $promotion->delete() ;
            DB::commit();
            toastr()->success(trans('site.updated'));
            return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    } 

}
