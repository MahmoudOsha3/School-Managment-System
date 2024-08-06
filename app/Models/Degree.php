<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    // public $table = 'degrees' ;
    // protected $fillable = ['student_id','quizze_id','question_id','score','abuse','date'] ;
    protected $guarded = [] ;

    /**
     * Get the student that owns the Degree
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
