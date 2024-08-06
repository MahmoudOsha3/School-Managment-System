<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Subject extends Model
{
    use HasFactory , HasTranslations;
    protected $guarded = [] ;
    public $translatable = ['name'] ;


        // Get the grade that owns the subject
        public function grade()
        {
            return $this->belongsTo(Grade::class, 'grade_id');
        }

        // Get the classroom that owns the subject
        public function classroom()
        {
            return $this->belongsTo(Classroom::class, 'classroom_id');
        }

        // Get the section that owns the subject
        public function section()
        {
            return $this->belongsTo(Sections::class, 'section_id');
        }

        // Get the grade that owns the subject
        public function teacher()
        {
            return $this->belongsTo(Teacher::class, 'teacher_id');
        }

}
