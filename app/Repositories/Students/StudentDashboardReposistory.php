<?php

namespace App\Repositories\Students ;
use App\Models\{AttendanceStudent , Library , Quizze , Student , OnlineClasses};
use App\Interfaces\Students\StudentDashboardReposistoryInterface;
use Hash ;


class StudentDashboardReposistory implements StudentDashboardReposistoryInterface
{
    // for view dashboard
    public function index()
    {
        $student = auth()->user() ;
        $data['attendance'] = AttendanceStudent::where(['student_id' => $student->id , 'attednace_status' => 1 ])->count() ;
        $data['absent'] = AttendanceStudent::where(['student_id' => $student->id , 'attednace_status' => 0 ])->count() ;
        $data['books'] = Library::where([
            'grade_id' => $student->grade_id ,
            'classroom_id' =>  $student->classroom_id,
            'section_id'=>  $student->section_id
            ])->count() ;
        return view('pages.Students.dashboard.index' , $data) ;
    }
    // for view all quizzes
    public function quizze()
    {
        $quizzes = Quizze::where([
            'grade_id' => auth()->user()->grade_id ,
            'classroom_id' =>  auth()->user()->classroom_id,
            'section_id'=>  auth()->user()->section_id
            ])->latest()->get();
        return view('pages.Students.dashboard.Quizze.index' , compact('quizzes'));
    }
    // for join quizze => exists livewire
    public function startQuizze($quizze_id)
    {
        $student = auth()->user() ;
        $quizze = Quizze::where([
            'id' => $quizze_id ,
            'grade_id' => $student->grade_id ,
            'classroom_id' => $student->classroom_id ,
            'section_id' => $student->section_id ,
            ])->first() ;
        // هذا الشرط يتتحقق من ان الشخص لدية الحق ان يدخل الامتحان ولا لا بحيث ان ممكن حدد يغير الرابط او الايدي و يخش علي امتحان تاني غير متاح لي فصلة
        if($quizze){
            return view('pages.Students.dashboard.Quizze.questions' , compact('quizze_id' , 'quizze')) ;
        }else{
            return redirect()->route('student.quizze');
        }
    }
    // for view all books
    public function library()
    {
        try
        {
            $student = Student::findorfail(auth()->user()->id) ;
            $books = Library::where([
                'grade_id' => $student->grade_id ,
                'classroom_id' => $student->classroom_id ,
                'section_id' => $student->section_id
            ])->latest()->get() ;
            return view('pages.students.dashboard.library.index' , compact('books')) ;
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function bookDownload($id)
    {
        try
        {
            $book = Library::findOrfail($id) ;
            return response()->download(public_path('attachemnts/library/'.$book->file_name));
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function onlineClasses()
    {
        try
        {
            $student = Student::findorfail(auth()->user()->id) ;
            $onlineClasses = OnlineClasses::where([
                'grade_id' => $student->grade_id ,
                'classroom_id' => $student->classroom_id ,
                'section_id' => $student->section_id
            ])->latest()->get() ;
            return view('pages.students.dashboard.onlineclasses.index' , compact('onlineClasses')) ;
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function profile()
    {
        try
        {
            $student = Student::findorfail(auth()->user()->id) ;
            return view('pages.Students.dashboard.Profile.index' , compact('student')) ;
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function updateProfile($request)
    {
        try
        {
            $student = Student::findorfail(auth()->user()->id) ;
            if(isset($request->password))
            {
                $student->update([
                    'password' => Hash::make($request->password) ,
                ]);
                return redirect()->back()->with(['success' => trans('site.updated')]) ;
            }
            return redirect()->back() ;
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}

