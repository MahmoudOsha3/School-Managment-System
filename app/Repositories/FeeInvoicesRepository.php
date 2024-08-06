<?php

namespace App\Repositories ;

use App\Interfaces\FeeInvoicesRepositoryInterface ;
use App\Models\{Fee , Grade , Classroom , Student , FeesInvoice , StudentAccounts};
use DB ;



class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{
    public function index()
    {
        $fees_invoices = FeesInvoice::all() ;
        return view('pages.Fees.FeesInvoice.viewFeeInvoiceTable' , compact('fees_invoices')) ;
    }


    public function showCreateFeeInvoice($student_id)
    {
        try{
            $student = Student::findOrfail($student_id);
            // انا عايز الرسوم بتاع الصف الدراسي بتعته فقط
            $fees = Fee::where('classroom_id' , $student->classroom_id)->get();
            return view('pages.Fees.FeesInvoice.createInvoiceblade' , compact('student' , 'fees')) ;
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    // تخزين قيمة الرسوم علي طالب قي جدول الفواتير ثم تخزينها في كشف حساب للطالب بحيث اعرف اللي دفعه ةو اللي متدفعش عشان ممكن يدفع علي شكل اقساط
    public function storeFeeInvoice($request)
    {
        // List_fees => it is in repeater
        // grade_id , $classroom => outside reapter it is be send once only
        DB::beginTransaction();
        try
        {
            $List_Fees = $request->List_Fees ;
            foreach ($List_Fees as $list_fee)
            {
                // اثبات ان الطالب علية فاتورة مثلا زي زي مدرسي
                $fee_invoice = FeesInvoice::create([
                    'invoice_date' => date('Y-m-d') ,
                    'student_id' => $list_fee['student_id'],
                    'grade_id' => $request->grade_id ,
                    'classroom_id' => $request->classroom_id ,
                    'fee_id' => $list_fee['fee_id'] ,
                    'amount' => $list_fee['amount'] ,
                ]);

                // لعرض حساب الطالب و ما عليه من فلوس او تم الدفع زي كشف حساب للطالب
                StudentAccounts::create([
                    'student_id' => $list_fee['student_id'] ,
                    'fee_invoice_id' => $fee_invoice->id,
                    'debit' => $list_fee['amount'] ,
                    'credit' => 0 ,
                ]);
            }
            DB::commit();
            toastr()->success(trans('site.added'));
            return redirect()->route('feesInvoices.index');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function updateFeeInvoice($request,$fee_invoice_id)
    {

        DB::beginTransaction();
        try
        {
            // لازم اعدل في قائمة الفواتير و في حساب الطالب كمان عشان يبقوا زب بعض
            $invoice = FeesInvoice::findOrfail($fee_invoice_id) ;
            $invoice->update([
                'amount' => $request->amount,
            ]);

            $student_account = StudentAccounts::where('fee_invoice_id' , $invoice->id)->first() ;
            $student_account->update([
                'debit' => $request->amount
            ]);

            DB::commit();
            toastr()->success(trans('site.updated'));
            return redirect()->route('feesInvoices.index');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function deleteFeeInvoice($fee_invoice_id)
    {
        // عند حذف الفاتورة من جدول الفواتير سوف يتم حذفها من جدول حساب الطالب عشان عمال delete cascade
        try
        {
            FeesInvoice::findOrfail($fee_invoice_id)->delete();
            toastr()->success(trans('site.deleted'));
            return redirect()->route('feesInvoices.index');
        }
        catch (\Exception $th) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

}
