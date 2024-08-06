<?php

namespace App\Interfaces;

interface PromotionStudentRepositoryInterface
{
    public function index() ;

    public function storePromotion($request) ; 

    public function returnAllPromotions() ;

    public function returnPromotionStudent($promotion_id) ;
}