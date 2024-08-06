<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB  , Hash;
use App\Models\{Teacher , Student , Library , Grade , Sections , AttendanceStudent } ;

class DashboardTeacherController extends Controller
{
    // public $teacher = auth()->user()->id ;

    public function index()
    {
        $teacher = auth()->user() ;
        $sectionsId = DB::table('teacher_section')->where('teacher_id' , $teacher->id )->pluck('section_id') ;
        $sections_count = $sectionsId->count() ;
        $student_count = Student::whereIn('section_id' , $sectionsId)->count();
        $books_count = Library::where('teacher_id' , $teacher->id )->count() ;
        return view('pages.Teachers.dashboard.index' , compact('sections_count' , 'student_count' , 'books_count')) ;
    }

    // list of students
    public function students()
    {
        try
        {
            $teacher = auth()->user() ;
            $sectionsId = DB::table('teacher_section')->where('teacher_id' , $teacher->id )->pluck('section_id') ;
            $students = Student::whereIn('section_id' , $sectionsId)->get() ;
            return view('pages.Teachers.dashboard.students' , compact('students')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    // list of sections
    public function sections()
    {
        try {
            $teacher = auth()->user() ;
            $sectionsId = DB::table('teacher_section')->where('teacher_id' , $teacher->id )->pluck('section_id');
            $sections = Sections::whereIn('id' , $sectionsId)->get();
            return view('pages.Teachers.dashboard.attendance.sections' , compact('sections')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    // start attendance

    // list of student using each section for(attendance and absent )
    public function studentSection($id)
    {
        try
        {
            $students = Student::where('section_id' , $id )->get() ;
            $section = Sections::findorfail($id);
            return view('pages.Teachers.dashboard.attendance.listStudentwithinSections' , get_defined_vars()) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    // store attendences
    public function attendance(Request $request)
    {
        try
        {
            // attendences[{{ $student->id }}]
            foreach ($request->attendences as $student_id => $stausAttendance )
            {
                $status = $stausAttendance == true ? 1 : 0 ;
                AttendanceStudent::updateOrCreate(
                    // condition
                    [
                        'student_id' => $student_id,
                        'date_attednace' => date('Y-m-d')
                    ]
                    ,[
                    'student_id' => $student_id ,
                    'grade_id' => $request->grade_id ,
                    'classroom_id' => $request->classroom_id ,
                    'section_id' => $request->section_id ,
                    'teacher_id' => auth()->user()->id ,
                    'date_attednace' => date('Y-m-d') ,
                    'attednace_status' => $status ,
                ]);
            }
            return redirect()->back()->with(['succeess' => trans('site.added')]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    // view page of report attendance
    public function attendanceReport()
    {
        // ألفصول الخاصة بالمعلم
        $sectionsId = DB::table('teacher_section')->where('teacher_id' , auth()->user()->id )->pluck('section_id') ;
        $list_all_student = Student::whereIn('section_id' , $sectionsId )->get() ;
        return view('pages.Teachers.dashboard.attendance.reports' , compact('list_all_student')) ;
    }


    // diplay data of each student using report
    public function viewReportAttendance(Request $request)
    {
        $sectionsId = DB::table('teacher_section')->where('teacher_id' , auth()->user()->id )->pluck('section_id') ;
        $list_all_student = Student::whereIn('section_id' , $sectionsId )->get() ;
        // -----------------------------------
        $request->validate([
            'from_date'  =>'required|date|date_format:Y-m-d',
            'to_date'=> 'required|date|date_format:Y-m-d|after_or_equal:from_date'
        ]);
        // report all students
        if($request->student_id == 0)
        {
            $attendance = AttendanceStudent::whereBetween('date_attednace' , [$request->from_date , $request->to_date])
                ->get();

            return view('pages.Teachers.dashboard.attendance.reports' , compact('attendance' , 'list_all_student') ) ;
        }
        // report using choose name of student
        else
        {
            $attendance = AttendanceStudent::whereBetween('date_attednace' , [$request->from_date , $request->to_date])
            ->where('student_id' , $request->student_id )->get();
            return view('pages.Teachers.dashboard.attendance.reports' , compact('attendance' , 'list_all_student') ) ;
        }
    }
    // end attendance


    public function profile()
    {
        $teacher = Teacher::where('id' , auth()->user()->id )->first() ;
        return view('pages.Teachers.dashboard.profile.index' , compact('teacher')) ;
    }

    public function updateProfile(Request $request)
    {
        try
        {
            $teacher = Teacher::findorfail(auth()->user()->id) ;
            if($request->password != null ){
                $teacher->update([
                    'name' => ['en' => $request->name_en , 'ar' => $request->name_ar ] ,
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->back()->with(['success' => trans('site.updated')]);
            }
            else{
                $teacher->update([
                    'name' => ['en' => $request->name_en , 'ar' => $request->name_ar ] ,
                ]);
                return redirect()->back()->with(['success' => trans('site.updated')]);
            }
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

}
