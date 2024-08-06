<?php

namespace App\Interfaces ;

interface ExculdeFeeRepositoryInterface
{
    public function index() ;

    public function createShowExculdefee($student_id) ;


    // public function showCreateExculdeFee($student_id) ;

    public function storeExculdeFees($request) ;

    // public function updateExculdeFee($request,$exculde_fee_id);

    // public function deleteExculdeFee($exculde_fee_id) ;

}
