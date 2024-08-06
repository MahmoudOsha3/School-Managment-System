<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\SubjectsRepositoryInterface ;

class SubjectController extends Controller
{
    protected $subject ;

    public function __construct(SubjectsRepositoryInterface $subject) {
        $this->subject = $subject;
    }
    public function index()
    {
        return $this->subject->index() ;
    }

    public function store(Request $request)
    {
        return $this->subject->store($request) ;
    }


    public function update(Request $request, $id)
    {
        return $this->subject->update($request , $id) ;
    }


    public function destroy($id)
    {
        return $this->subject->destroy($id) ;
    }
}
