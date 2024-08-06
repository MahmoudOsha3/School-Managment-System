<?php

namespace App\Interfaces ;

interface ExamsRepositoryInterface
{
    public function index() ;

    public function store($request) ;

    public function update($request , $id) ;

    public function destroy($id) ;


}

