<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LibraryRepositoryInterface ;

class LibraryController extends Controller
{
    protected $library ;
    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library = $library;
    }
    public function index()
    {
        return $this->library->index() ;
    }


    public function create()
    {
        return $this->library->create() ;
    }

    public function store(Request $request)
    {
        return $this->library->store($request) ;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->library->edit($id) ;
    }

    public function update(Request $request, $id)
    {
        return $this->library->update($request , $id) ;
    }


    public function destroy($id)
    {
        return $this->library->destroy($id) ;
    }

    public function downloadBook($id)
    {
        return $this->library->downloadBook($id) ;
    }
}
