<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parent\Dashboard\DashboardController ;



Route::group([
    'middleware' => ['auth:parent' , 'localizationRedirect' , 'localeSessionRedirect' , 'localeCookieRedirect'] ,
    'prefix' => LaravelLocalization::setLocale()
],
function(){
    Route::prefix('parent')->group(function () {
        Route::get('dashboard' , [DashboardController::class ,'index'])->name('parent.dashboard');
        Route::get('students' , [DashboardController::class ,'students'])->name('parent.students');
        Route::get('students/degree/quizzes/{student_id}' , [DashboardController::class ,'degreeQuizzes'])->name('parent.students.quizzes');
        Route::get('students/attendance' , [DashboardController::class ,'attendance'])->name('students.attendance');
        Route::post('students/report/attendance' , [DashboardController::class ,'reportAttedance'])->name('parent.select.view.report.attendanece');

        // ============================= Fees & Invoices =========================
        Route::get('students/invoices/{student_id}' , [DashboardController::class ,'invoices'])->name('parent.invoice');
        Route::get('students/invoices/payment/{student_id}' , [DashboardController::class ,'paymentStudent'])->name('parent.student.payment');

        // ============================ Patyment visa (stripe) ===================
        // Route::get('student/{student_id}/payment' , [DashboardController::class ,'paymentWithinVisa'])->name('stripe.payment.visa');
        // Route::get('student/{student_id}/payments' , [DashboardController::class ,'createStripePaymetIntent'])->name('create.stripe.payment') ;


    });
});



