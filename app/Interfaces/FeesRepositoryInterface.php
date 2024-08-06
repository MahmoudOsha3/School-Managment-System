<?php

namespace App\Interfaces ;

interface FeesRepositoryInterface
{
    public function index() ;

    public function store($request) ;

    public function update($request , $id );

    public function deleted($id) ;

}
