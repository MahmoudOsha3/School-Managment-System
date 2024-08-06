<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ExamsRepositoryInterface ;

class ExamsController extends Controller
{
    protected $exam ;

    public function __construct(ExamsRepositoryInterface $exam) {
        $this->exam = $exam;
    }
    public function index()
    {
        return $this->exam->index() ;
    }

    public function store(Request $request)
    {
        return $this->exam->store($request) ;
    }

    public function update(Request $request, $id)
    {
        return $this->exam->update($request , $id ) ;
    }

    public function destroy($id)
    {
        return $this->exam->destroy($id) ;
    }
}
