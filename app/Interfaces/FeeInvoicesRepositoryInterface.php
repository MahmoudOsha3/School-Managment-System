<?php

namespace App\Interfaces ;

interface FeeInvoicesRepositoryInterface
{
    public function index() ;

    public function showCreateFeeInvoice($student_id) ;

    public function storeFeeInvoice($request) ;

    public function updateFeeInvoice( $request,$fee_invoice_id);

    public function deleteFeeInvoice($fee_invoice_id) ;

}
