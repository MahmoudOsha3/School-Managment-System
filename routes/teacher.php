<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Dashboard\DashboardTeacherController ;
use App\Http\Controllers\Teacher\Dashboard\{QuizzeController , QuestionController , OnlineClassesController , LibraryController};


Route::group([
    'middleware' => ['auth:teacher' , 'localizationRedirect' , 'localeSessionRedirect' , 'localeCookieRedirect'] ,
    'prefix' => LaravelLocalization::setLocale()
],
function(){
    Route::prefix('teacher')->group(function () {

        Route::get('/dashboard' , [DashboardTeacherController::class ,'index'])->name('dashboard.teacher');

        //========================= Student & Sections ================
        Route::get('/students' , [DashboardTeacherController::class ,'students'])->name('teacher.students');
        Route::get('/sections' , [DashboardTeacherController::class ,'sections'])->name('teacher.sections');

        //========================= Attendnce ================
        Route::get('/listStudent/{id}' , [DashboardTeacherController::class ,'studentSection'])->name('teacher.listStudentWithinSection');
        Route::post('/attendance' , [DashboardTeacherController::class ,'attendance'])->name('teacher.attendance');
        Route::get('/attendance/reports' , [DashboardTeacherController::class ,'attendanceReport'])->name('teacher.attendance.reports');
        Route::post('/attendance/reports' , [DashboardTeacherController::class ,'viewReportAttendance'])->name('teacher.view.attendance.reports');

        //====================== Quizze ======================
        Route::resource('quizze', QuizzeController::class);
        Route::get('getClasses/{grade_id}', [QuizzeController::class ,  'getClasses']);
        Route::get('getSections/{classroom_id}', [QuizzeController::class ,  'getSection']);
        Route::get('getSubject/{section_id}', [QuizzeController::class ,  'getSubject']);
        Route::get('report/quizze/{quizze_id}' , [QuizzeController::class ,'reportQuizze'])->name('report.quizze');


        // =================== Question ======================
        Route::resource('question', QuestionController::class);

        // =================== Online Classes =================
        Route::resource('onlineclass', OnlineClassesController::class);


        // ====================== profile =====================
        Route::get('profile' , [DashboardTeacherController::class , 'profile'] )->name('teacher.profile') ;
        Route::post('profile/update' , [DashboardTeacherController::class , 'updateProfile'] )->name('teacher.profile.update') ;


        // ===================== Library ===========================
        Route::resource('libraries', LibraryController::class);
        Route::get('libraries/book/download/{id}', [LibraryController::class , 'downloadBook'])->name('taecher.download.book');




    });
});
