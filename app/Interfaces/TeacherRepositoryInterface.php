<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface
{

    public function getAllTeachers() ;

    public function getAllSpecialization();

    public function getAllGender();

    public function storeTeacher($request) ;

    public function editTeacher($id) ;

    public function updateTeacher($request , $id) ;

    public function deleteTeacher($id) ;

}

