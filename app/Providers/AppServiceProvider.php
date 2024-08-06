<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{FeesRepository,PromotionStudentRepository , ExculdeFeeRepository , StudentRepository ,TeacherRepository , FeeInvoicesRepository , ReceiptStudentsRepository , AttendanceRepository , SubjectsRepository , ExamsRepository , QuizzeRepository , QuestionRepository , OnlineClassesRepository , LibraryRepository} ;
use App\Interfaces\{FeesRepositoryInterface ,ExculdeFeeRepositoryInterface , PromotionStudentRepositoryInterface , StudentRepositoryInterface ,TeacherRepositoryInterface , FeeInvoicesRepositoryInterface , ReceiptStudentsRepositoryInterface , AttendanceRepositoryInterface , SubjectsRepositoryInterface , ExamsRepositoryInterface , QuizzeRepositoryInterface , QuestionRepositoryInterface , OnlineClassesRepositoryInterface , LibraryRepositoryInterface} ;
use App\Interfaces\Students\StudentDashboardReposistoryInterface;
use App\Repositories\Students\StudentDashboardReposistory ;

use App\Interfaces\Parents\ParentsRepositoryInterface ;
use App\Repositories\Parents\ParentsRepository ;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(PromotionStudentRepositoryInterface::class, PromotionStudentRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ExculdeFeeRepositoryInterface::class, ExculdeFeeRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectsRepositoryInterface::class, SubjectsRepository::class);
        $this->app->bind(ExamsRepositoryInterface::class, ExamsRepository::class);
        $this->app->bind(QuizzeRepositoryInterface::class, QuizzeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(OnlineClassesRepositoryInterface::class, OnlineClassesRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);


        // Dashboard students
        $this->app->bind(StudentDashboardReposistoryInterface::class, StudentDashboardReposistory::class);
        // Dashboard parents
        $this->app->bind(ParentsRepositoryInterface::class, ParentsRepository::class);



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
