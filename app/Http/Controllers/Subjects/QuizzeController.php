<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\QuizzeRepositoryInterface ;


class QuizzeController extends Controller
{
    protected $quizze ;

    public function __construct(QuizzeRepositoryInterface $quizze) {
        $this->quizze = $quizze;
    }
    public function index()
    {
        return $this->quizze->index() ;
    }

    public function store(Request $request)
    {
        return $this->quizze->store($request) ;
    }

    public function update(Request $request, $id)
    {
        return $this->quizze->update($request , $id ) ;
    }

    public function destroy($id)
    {
        return $this->quizze->destroy($id) ;
    }
}
