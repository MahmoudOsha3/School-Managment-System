<?php

namespace App\Http\Controllers\onlineClasses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\OnlineClassesRepositoryInterface ;

class OnlineClasseController extends Controller
{
    protected $onlineClasses ;

    public function __construct(OnlineClassesRepositoryInterface $onlineClasses) {
        $this->onlineClasses = $onlineClasses;
    }


    public function index()
    {
        return $this->onlineClasses->index() ;
    }


    public function create()
    {
        return $this->onlineClasses->create() ;
    }


    public function store(Request $request)
    {
        return $this->onlineClasses->store($request) ;
    }


    public function destroy(Request $request , $id)
    {
        return $this->onlineClasses->destroy($request , $id ) ;
    }
}
