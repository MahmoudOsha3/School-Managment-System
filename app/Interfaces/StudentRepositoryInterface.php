<?php

namespace App\Interfaces ;

interface StudentRepositoryInterface
{
    public function getAllStudent() ;

    public function createStudent() ;

    public function storeStudent($request) ;

    public function showStudent($id) ;

    public function  getSectionsAjax($classroom_id) ;

    public function editStudent($id) ;

    public function updateStudent($request , $id) ;

    public function deleteStudent($id) ;

    public function uploadAddtionalAttachments($request) ;

    public function downloadFile($studentName , $fileName) ;

    public function deleteStudentAttachments($request) ;


}

