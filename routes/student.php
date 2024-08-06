<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\Students\Dashboard\DashboardController ;



Route::group([
    'middleware' => ['auth:student' , 'localizationRedirect' , 'localeSessionRedirect' , 'localeCookieRedirect'] ,
    'prefix' => LaravelLocalization::setLocale()
],
function(){
    Route::prefix('student')->group(function () {
        Route::get('/dashboard' , [DashboardController::class ,'index'])->name('student.dashboard');

        // ===================== Quizze ===================
        Route::get('/quizze' , [DashboardController::class ,'quizze'])->name('student.quizze');
        Route::get('start/quizze/{quizze_id}' , [DashboardController::class ,'startQuizze'])->name('student.quizze.strat');

        // =================== Library ====================
        Route::get('library' , [DashboardController::class ,'library'])->name('student.library') ;
        Route::get('library/book/download/{id}' , [DashboardController::class ,'bookDownload'])->name('student.book.download') ;

        // ================ online classes ================
        Route::get('onlineclasses' , [DashboardController::class ,'onlineClasses'])->name('student.onlineclass') ;

        // ===================== Profile ==================
        Route::get('profile' , [DashboardController::class ,'profile'])->name('student.profile') ;
        Route::post('profile/update' , [DashboardController::class ,'updateProfile'])->name('student.profile.update') ;


    });
});


