<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Quizze extends Model
{
    use HasFactory , HasTranslations ;
    public $translatable = ['title'] ;
    protected $fillable = ['title' , 'subject_id' , 'grade_id' , 'classroom_id' , 'section_id' , 'teacher_id'] ;



    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'quizze_id');
    }


    public function degree()
    {
        return $this->hasMany(Degree::class, 'quizze_id');
    }

    public function report_degree_quizze()
    {
        return $this->hasMany(ReportDegreeQuizze::class, 'quizze_id');
    }

}
