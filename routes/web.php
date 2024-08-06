<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grade\GradeController ;
use App\Http\Controllers\Classroom\ClassroomController ;
use App\Http\Controllers\Sections\SectionsController ;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Students\{StudentController , PromotionControler ,GraduatedController , FeesController , FeeInvoiceController , ReceiptStudentController , ExculdeFeesController , AttendanceController};
use App\Http\Controllers\Subjects\{SubjectController , ExamsController , QuizzeController , QuestionController } ;
use App\Http\Controllers\onlineClasses\OnlineClasseController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\Settings\SettingController ;
use App\Http\Controllers\{UserController , HomeController } ;
use App\Http\Controllers\Auth\LoginController ;
use App\Http\Livewire\Calendar;
use App\Models\EventCalender;


// Auth::routes(['verify' => true]);


//===================== Authentications =================
Route::group(['middleware' => ['guest']],function(){

    Route::get('/' , [HomeController::class , 'index'])->name('selection') ;
    Route::get('login/{type}' , [LoginController::class , 'loginForm'])->name('login.show') ;
    Route::post('login' , [LoginController::class , 'login'])->name('login') ;
});
// logout
Route::get('logout/{type}' , [LoginController::class , 'logout'])->name('logout') ;
// ==================== End Authentication ==============


// ===================== Routes of Admins ===============
Route::group([
            'middleware' => ['auth' , 'localizationRedirect' , 'localeSessionRedirect' , 'localeCookieRedirect'] ,
            'prefix' => LaravelLocalization::setLocale()
        ],
    function(){

        Route::get('/dashboard', [HomeController::class, 'dashboard']);

        // =====================Users=====================
        Route::resource('users' , UserController::class) ;

        // =====================Grades=====================
        Route::resource('grade' , GradeController::class) ;

        // =====================Classrooms=====================
        Route::resource('classroom' , ClassroomController::class);
        Route::post('/classroom/delete_all' , [ClassroomController::class , 'delete_all'])->name('delete_all');


        // ======================Sections======================
        Route::resource('sections' , SectionsController::class);
        // ajax
        Route::get('classes/{id}' , [SectionsController::class , 'getClasses']);

        //=======================Parent======================
        Route::view(/*route*/'add-parent' ,/*view*/ 'livewire.show_form')->name('add-parents');


        //======================= Teachers ======================
        Route::resource('teachers', TeacherController::class);


        //================================ Students =================================
        Route::resource('students', StudentController::class);
        // ajax
        Route::get('get_sections/{classroom_id}' , [StudentController::class , 'getSections']);
        Route::post('upload_attachments' , [StudentController::class , 'uploadAttachments'] )->name('upload_attachments') ;
        Route::get('download_attachments/{studentName}/{fileName}' , [StudentController::class , 'downloadAttachments'] )->name('download_attachments') ;
        Route::post('delete_attachments' , [StudentController::class , 'deleteAttachments'] )->name('delete_attachments') ;
        // promotions
        Route::resource('promotions', PromotionControler::class);
        Route::get('promotions/return/{id}', [PromotionControler::class , 'retuenPromotion'])->name('return.promotion');
        // graduations
        Route::resource('graduates', GraduatedController::class);
        // attendance
        Route::resource('attendance', AttendanceController::class);
        // subjects
        Route::resource('subjects', SubjectController::class);
        // exams
        Route::resource('exams', ExamsController::class);
        //quizzes
        Route::resource('quizzes', QuizzeController::class);
        // quetions
        Route::resource('questions', QuestionController::class);
        // online classes
        Route::resource('onlineClasses', OnlineClasseController::class);
        // Library
        Route::resource('library', LibraryController::class);
        Route::get('library/book/download/{id}', [LibraryController::class , 'downloadBook'])->name('download.book');


        // ===================================== Finanical =============================================
        Route::resource('fees', FeesController::class);
        Route::resource('feesInvoices', FeeInvoiceController::class);
        Route::resource('receiptStudent', ReceiptStudentController::class);
        Route::resource('exculdeFees', ExculdeFeesController::class);

        Route::get('get_amount/{fee_id}' , [FeeInvoiceController::class , 'getAmount'])->name('get_amount') ;

        // settings of school
        Route::resource('settings', SettingController::class);

        // calender in dashboard admin
        Livewire::component('calendar', Calendar::class);

    });

