<?php

namespace App\Http\Controllers\Parent\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Parents\ParentsRepositoryInterface ;

class DashboardController extends Controller
{
    protected $parent ;
    public function __construct(ParentsRepositoryInterface $parent) {
        $this->parent = $parent;
    }

    public function index()
    {
        return $this->parent->index() ;
    }

    // for view my sons
    public function students()
    {
        return $this->parent->students() ;
    }


    // من اجل عرض درجات الطلاب الخاصين ب ولي الامر فقط
    public function degreeQuizzes($student_id)
    {
        return $this->parent->degreeQuizzes($student_id) ;
    }


    public function attendance()
    {
        return $this->parent->attendance() ;
    }

    public function reportAttedance(Request $request)
    {
        return $this->parent->reportAttedance($request) ;
    }


    public function invoices($student_id)
    {
        return $this->parent->invoices($student_id) ;
    }

    public function paymentStudent($student_id)
    {
        return $this->parent->paymentStudent($student_id) ;
    }

    // payment with visa
    // public function createStripePaymetIntent($student_id)
    // {
    //     return $this->parent->createStripePaymetIntent($student_id);
    // }

    // public function paymentWithinVisa($student_id)
    // {
    //     return $this->parent->paymentWithinVisa($student_id) ;
    // }
}
