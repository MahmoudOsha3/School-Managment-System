<?php

namespace App\Repositories;
use App\Interfaces\AttendanceRepositoryInterface ;
use App\Models\{Grade , Student , Sections , AttendanceStudent } ;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    // list of sections
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        // return $grades ;
        return view('pages.attendance.listSections' , compact('grades')) ;
    }


    // قائمة الفصول اللي يديرها المعلم من خلالها يقدر يختار الفصل لتحضير الطلاب
    public function showStudent($section_id)
    {
        $students = Student::where('section_id' , $section_id)->get() ;
        $section = Sections::where('id' , $section_id)->first() ;
        return view('pages.attendance.listStudents' , compact('students' , 'section')) ;
    }



    public function storeAttendance($request)
    {
        try {

            // attendences[stu_id_1 , stu_id_2 , ... ]
            foreach ($request->attendences as $student_id => $valueOfAttendance)
            {
                $attendance_status = $valueOfAttendance == true ? 1 : 0 ;
                AttendanceStudent::create([
                    'student_id' => $student_id , // key
                    'grade_id' => $request->grade_id ,
                    'classroom_id' =>$request->classroom_id,
                    'section_id' => $request->section_id ,
                    'teacher_id' => $request->teacher_id ,
                    'date_attednace'=>  now() ,
                    'attednace_status'=> $attendance_status ,
                ]);
            }
            toastr()->success(trans('site.added'));
            return redirect()->back();

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




}
