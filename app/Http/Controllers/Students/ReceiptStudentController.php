<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ReceiptStudentsRepositoryInterface ;
use App\Models\StudentAccounts ;


class ReceiptStudentController extends Controller
{
    protected $receipt ;
    public function __construct(ReceiptStudentsRepositoryInterface $receipt) {
        $this->receipt = $receipt ;
    }
    public function index()
    {
        return $this->receipt->index() ;
    }


    public function create()
    {
        //
    }


    // for create recepit
    public function show($student_id)
    {
        return $this->receipt->createRecepit($student_id) ;
    }

    // store recepit
    public function store(Request $request)
    {
        return $this->receipt->storeRecepit($request);
    }


        // حساب المبلغ المتبقي علي الطالب
        // public function calcDebitStudent($student_id)
        // {

        // }


    public function edit($student_id)
    {
        // المبلغ الكلي اللي علية
        $debit = StudentAccounts::where('student_id' , $student_id)->sum('debit') ;
        $credit = StudentAccounts::where('student_id' , $student_id)->sum('credit') ;

        return $debit - $credit ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
