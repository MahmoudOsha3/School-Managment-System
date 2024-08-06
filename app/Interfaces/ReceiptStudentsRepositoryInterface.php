<?php
namespace App\Interfaces ;

interface ReceiptStudentsRepositoryInterface
{
    public function index() ;

    public function  createRecepit($student_id);

    public function  storeRecepit($request);

}
