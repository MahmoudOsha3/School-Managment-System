<?php

namespace App\Interfaces ;

interface AttendanceRepositoryInterface
{
    public function index() ;

    public function showStudent($section_id);

    public function storeAttendance($request) ;
}
