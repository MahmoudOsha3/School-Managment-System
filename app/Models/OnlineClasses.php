<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClasses extends Model
{
    use HasFactory;
    public $fillable= ['grade_id','classroom_id','section_id','subject_id', 'created_by' ,'meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo(Sections::class , 'section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class , 'subject_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
