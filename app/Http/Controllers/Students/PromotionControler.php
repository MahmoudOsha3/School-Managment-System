<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PromotionStudentRepositoryInterface ;
use App\Models\Promotion ;


class PromotionControler extends Controller
{
    protected $student ;
    public function __construct(PromotionStudentRepositoryInterface $stu) {
        $this->student = $stu ;
    }
    public function index()
    {
        return $this->student->index() ;
    }


    // table of promotions 
    public function create()
    {
        $promotions = Promotion::all() ;
        return view('pages.Students.promotion.managment' , compact('promotions')) ;
    }


    public function store(Request $request)
    {
        return $this->student->storePromotion($request) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    // return about promotion one student only 
    public function update(Request $request, $id)
    {
        return $request ;
    }

    public function retuenPromotion($promotion_id)
    {
        return $this->student->returnPromotionStudent($promotion_id) ;
    }


    public function destroy()
    {
        return $this->student->returnAllPromotions() ;
    }
}
