<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\FeesRepositoryInterface ;

class FeesController extends Controller
{

    protected $fees  ;
    public function __construct(FeesRepositoryInterface $fee) {
        $this->fees = $fee ;
    }
    public function index()
    {
        return $this->fees->index() ;
    }

    public function store(Request $request)
    {
        return $this->fees->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        return $this->fees->update($request , $id );
    }

    public function destroy($id)
    {
        return $this->fees->deleted($id);

    }
}
