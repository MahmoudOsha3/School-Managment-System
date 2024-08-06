<?php

namespace App\Interfaces\Parents ;

interface ParentsRepositoryInterface
{
    public function index() ;

    public function students() ;

    public function degreeQuizzes($student_id) ;

    public function attendance() ;

    public function reportAttedance($request) ;

    public function invoices($student_id);

    public function paymentStudent($student_id) ;

    // public function createStripePaymetIntent($student_id) ;

    // public function paymentWithinVisa($student_id) ;
}
