<?php

namespace App\Repositories ;
use App\Interfaces\ReceiptStudentsRepositoryInterface ;
use App\Models\{ReceiptStudent , Student , FuntAccount , StudentAccounts } ;
use DB ;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{

            // المبلغ الكلي اللي علية
            // $debit = StudentAccounts::where('student_id' , $student_id)->sum('debit') ;
            // $credit = StudentAccounts::where('student_id' , $student_id)->sum('credit') ;

    public function index()
    {
        $receipt_students = ReceiptStudent::all() ;
        return view('pages.Recepit.index' , compact('receipt_students')) ;
    }

    public function  createRecepit($student_id)
    {
        $student = Student::where('id' , $student_id)->first() ;
        return  view('pages.Recepit.createRecepit' , compact('student')) ;
    }


    // هخزن المبلغ في جدول الايصالات ثم اخزن المبلغ في جدول الصندوقبتاع المدرسة ثم اخزنه في جدول حساب الطالب
    public function  storeRecepit($request)
    {
        DB::beginTransaction();
        try
        {

            // store Receipt
            $receipt = ReceiptStudent::create([
                'date' => date('Y-m-d') ,
                'student_id' => $request->student_id,
                'debit' => $request->debit,
            ]);

            // store Funt account حساب الصندوق
            FuntAccount::create([
                'date' => date('Y-m-d') ,
                'recepit_id' => $receipt->id , // اقدر من خلال اجيب الطالب اللي دفع عادي و غيره
                'debit' => $request->debit , // يعني دخللك فلوس
                'credit' => 0.00 , // يعني مخرجش منك فلوس
            ]);

            // تخزين القيمة اللي اتدفعت علي حساب الطالب عشان ام اجي احسب التوتال اللي عليه اطرح منه المبلغ اللي ادفع
            StudentAccounts::create([
                'student_id' => $request->student_id ,
                'recepit_id' => $receipt->id ,
                'debit' => 00.0 , // هو مخدش فلوس هو دفع
                'credit' => $request->debit , // كد الطالب دفع المبلغ ده
            ]);

            DB::commit();
            return redirect()->back()->with(['success' => trans('site.added')]) ;

        }
        catch (\Exeption $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]) ;
        }
    }

}



