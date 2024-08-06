<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Students\StudentDashboardReposistoryInterface ;


class DashboardController extends Controller
{
    protected $student ;
    public function __construct(StudentDashboardReposistoryInterface $student) {
        $this->student = $student;
    }

    // for view dashboard
    public function index()
    {
        return $this->student->index() ;
    }

    // for view all quizzes
    public function quizze()
    {
        return $this->student->quizze() ;

    }

    // for join quizze => exists livewire
    public function startQuizze($quizze_id)
    {
        return $this->student->startQuizze($quizze_id) ;

    }

    // for view all books
    public function library()
    {
        return $this->student->library() ;
    }

    // for view all books
    public function bookDownload($id)
    {
        return $this->student->bookDownload($id) ;
    }

    public function onlineClasses()
    {
        return $this->student->onlineClasses() ;
    }

    public function profile()
    {
        return $this->student->profile() ;
    }

    public function updateProfile(Request $request)
    {
        return $this->student->updateProfile($request) ;
    }

}
