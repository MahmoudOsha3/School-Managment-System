<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Fee extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = ['title' , 'amount' , 'grade_id' , 'classroom_id' , 'year'];
    public $translatable = ['title'];

    // Get the grade that owns the Fee
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


    // Get the classroom that owns the Fee
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
