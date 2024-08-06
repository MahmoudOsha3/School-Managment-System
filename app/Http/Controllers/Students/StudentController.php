<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentRepositoryInterface ;
use App\Http\Requests\StudentRequest ;

class StudentController extends Controller
{
    protected $student ;

    public function __construct(StudentRepositoryInterface $student) {
        $this->student = $student ;
    }

    public function index()
    {
        return $this->student->getAllStudent() ;
    }


    public function create()
    {
        return $this->student->createStudent() ;
    }

    public function getSections($classroom_id)
    {
        return $this->student->getSectionsAjax($classroom_id) ;
    }


    public function store(StudentRequest $request)
    {
        return $this->student->storeStudent($request) ;
    }

    public function show($id)
    {
        return $this->student->showStudent($id) ;
    }

    public function edit($id)
    {
        return $this->student->editStudent($id) ;
    }

    public function update(StudentRequest $request, $id)
    {
        return $this->student->updateStudent($request , $id) ;
    }

    public function destroy($id)
    {
        return  $this->student->deleteStudent($id) ;
    }

    public function uploadAttachments(Request $request)
    {
        return  $this->student->uploadAddtionalAttachments($request) ;
    }

    public function downloadAttachments($studentName , $fileName)
    {
        return $this->student->downloadFile($studentName , $fileName);
    }

    public function deleteAttachments(Request $request)
    {
        return $this->student->deleteStudentAttachments($request);
    }
}
