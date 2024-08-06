<?php

namespace App\Repositories\Parents ;
use App\Interfaces\Parents\ParentsRepositoryInterface ;
use Illuminate\Http\Request;
use App\Models\{My_Parent , Student , ReportDegreeQuizze , AttendanceStudent , FeesInvoice , ReceiptStudent} ;


class ParentsRepository implements ParentsRepositoryInterface
{
    public function index()
    {
        $parent = auth()->user() ;
        return view('pages.parent.dashboard.index' , compact('parent'));
    }

    // for view my sons
    public function students()
    {
        try
        {
            $students = Student::where('parent_id' , auth()->user()->id )->get() ;
            return view('pages.parent.dashboard.students' , compact('students'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    // من اجل عرض درجات الطلاب الخاصين ب ولي الامر فقط
    public function degreeQuizzes($student_id)
    {
        try
        {
            $student = Student::findorfail($student_id) ;
            if($student->parent_id !== auth()->user()->id)
            {
                toastr()->error(trans('site.error_code_student'));
                return redirect()->route('parent.students');
            }

            $reports = ReportDegreeQuizze::where('student_id' , $student_id)->latest()->get() ;
            if($reports->isEmpty())
            {
                return redirect()->route('parent.students')->with(['warning' => trans('site.student_not_quizze')]);
            }

            return view('pages.parent.dashboard.quizzes' , compact('reports'));
        }
        catch(\Exception $e)
        {
            toastr()->error(trans('site.error_code_student'));
            return redirect()->route('parent.students');
        }
    }


    public function attendance()
    {
        try
        {
            $students = Student::where('parent_id' , auth()->user()->id )->get();
            return view('pages.parent.dashboard.attendance.index' , compact('students'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function reportAttedance($request)
    {
        try
        {
            $request->validate([
                'from_date'  =>'required|date|date_format:Y-m-d',
                'to_date'=> 'required|date|date_format:Y-m-d|after_or_equal:from_date'
            ]);

            $students = Student::where('parent_id' , auth()->user()->id )->get();
            $attendance = AttendanceStudent::whereBetween('date_attednace' , [$request->from_date , $request->to_date])
            ->where('student_id' , $request->student_id )->get();
            return view('pages.parent.dashboard.attendance.index' , compact('attendance' , 'students') ) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function invoices($student_id)
    {
        try
        {
            $student = Student::findorfail($student_id) ;
            if($student->parent_id !== auth()->user()->id)
            {
                toastr()->error(trans('site.error_code_student'));
                return redirect()->route('parent.students');
            }

            $fees_invoices = FeesInvoice::where('student_id' , $student_id )->get() ;
            if($fees_invoices->isEmpty())
            {
                return redirect()->route('parent.students')->with(['warning' => trans('site.student_not_invoice')]);
            }
            return view('pages.Parent.Dashboard.FeesInvoice.index' , compact('fees_invoices')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function paymentStudent($student_id)
    {
        try
        {
            $student = Student::findorfail($student_id) ;
            if($student->parent_id !== auth()->user()->id)
            {
                toastr()->error(trans('site.error_code_student'));
                return redirect()->route('parent.students');
            }

            $payments = ReceiptStudent::where('student_id',$student_id)->get();
            if($payments->isEmpty())
            {
                return redirect()->route('parent.students')->with(['warning' => trans('site.student_not_payment')]);
            }
            return view('pages.Parent.Dashboard.FeesInvoice.payments' , compact('payments')) ;
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    // public function paymentWithinVisa($student_id)
    // {
    //     return view('pages.Parent.Dashboard.payment.payment' , compact('student_id'));
    // }

    // public function createStripePaymetIntent($student_id)
    // {
    //     $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

    //     // Create a PaymentIntent with amount and currency
    //     $paymentIntent = $stripe->paymentIntents->create([
    //         'amount' => 5000 ,
    //         'currency' => 'USD' ,
    //         "description" =>  "Student payment" ,
    //         // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
    //     ]);

    //     return [
    //         'clientSecret' => $paymentIntent->client_secret
    //     ] ;

    // }

}

