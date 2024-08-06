<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Exam extends Model
{
    use HasFactory , HasTranslations ;

    protected $fillable =['title' , 'term' , 'acadmeic_year'];
    public $translatable = ['title'] ;

}
