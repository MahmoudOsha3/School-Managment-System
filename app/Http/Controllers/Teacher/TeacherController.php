<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\TeacherRepositoryInterface ;
use App\Http\Requests\TeacherRequest ;
use App\Models\Teacher ;
use Hash ;


class TeacherController extends Controller
{
    protected $teacher ;

    public function __construct(TeacherRepositoryInterface $teacher) {
        $this->teacher = $teacher ;
    }


    public function index()
    {
        return $this->teacher->getAllTeachers() ;
    }

    public function create()
    {
        $specializations = $this->teacher->getAllSpecialization() ;
        $genders = $this->teacher->getAllGender() ;

        return view('pages.Teachers.create' , compact('specializations' , 'genders')) ;
    }


    public function store(TeacherRequest $request)
    {
        return $this->teacher->storeTeacher($request) ;
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->teacher->editTeacher($id) ;
    }

    public function update(TeacherRequest $request, $id)
    {
        return $this->teacher->updateTeacher($request , $id) ;
    }

    public function destroy($id)
    {
        return $this->teacher->deleteTeacher($id);
    }
}
