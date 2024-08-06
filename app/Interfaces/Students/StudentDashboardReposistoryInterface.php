<?php

namespace  App\Interfaces\Students;

interface StudentDashboardReposistoryInterface
{
   // for view dashboard
   public function index() ;

   // for view all quizzes
   public function quizze() ;

   // for join quizze => exists livewire
   public function startQuizze($quizze_id);

   // for view all books
   public function library() ;

   // for view all books
   public function bookDownload($id) ;

   public function onlineClasses() ;

   public function profile() ;

   public function updateProfile($request) ;

}
