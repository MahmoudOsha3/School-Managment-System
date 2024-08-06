<?php

namespace App\Interfaces ;

interface SubjectsRepositoryInterface
{
    public function index() ;

    public function store($request) ;

    public function update($request , $id) ;

    public function destroy($id) ;

    
}

