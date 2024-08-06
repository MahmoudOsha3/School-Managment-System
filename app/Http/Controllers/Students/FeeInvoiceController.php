<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\FeeInvoicesRepositoryInterface ;
use App\Models\Fee ;

class FeeInvoiceController extends Controller
{

    protected $feesInvoices  ;
    public function __construct(FeeInvoicesRepositoryInterface $feeInvoice) {
        $this->feesInvoices = $feeInvoice ;
    }


    // for display table of ionvoices
    public function index()
    {
        return $this->feesInvoices->index();
    }



    // store fee invoice
    public function store(Request $request)
    {

        return $this->feesInvoices->storeFeeInvoice($request);

    }

    // create fees invoice for student
    public function show($student_id)
    {
        return $this->feesInvoices->showCreateFeeInvoice($student_id);

    }


    public function update(Request $request, $fee_invoice_id)
    {
        return $this->feesInvoices->updateFeeInvoice($request,$fee_invoice_id);
    }



    public function destroy($fee_invoice_id)
    {
        return $this->feesInvoices->deleteFeeInvoice($fee_invoice_id) ;
    }

    public function getAmount($id)
    {
        return Fee::where('id' , $id)->pluck('amount') ;
    }
}
