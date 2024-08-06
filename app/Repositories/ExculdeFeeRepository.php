<?php

namespace App\Repositories ;

use App\Interfaces\ExculdeFeeRepositoryInterface ;
use App\Models\{Student , FeesInvoice , ExculdeFee , StudentAccounts};
use DB ;



class ExculdeFeeRepository implements ExculdeFeeRepositoryInterface
{
    public function index()
    {
        $exculde_fees = ExculdeFee::all() ;
        return view('pages.ExculdeFee.index' , compact('exculde_fees')) ;
    }

    public function createShowExculdefee($student_id)
    {
        try
        {
            $student = Student::findOrFail($student_id) ;
            return view('pages.ExculdeFee.createExculdeFee' , compact('student')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeExculdeFees($request)
    {
        DB::beginTransaction();
        try
        {
            $exculde_fee = ExculdeFee::create([
                'date' => date('Y-m-d') ,
                'student_id' => $request->student_id ,
                'amount' => $request->amount ,
                'description' => $request->description
            ]);

            StudentAccounts::create([
                'student_id' => $request->student_id ,
                'exculde_fee_id' => $exculde_fee->id ,
                'debit' => 00.0,
                'credit' => $request->amount ,
            ]);

            DB::commit();
            toastr()->success(trans('student.added_exculde'));
            return redirect()->back();

        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
