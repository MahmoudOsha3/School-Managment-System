<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\{Grade , Section} ;


class Promotion extends Model
{
    use HasFactory;
    protected $guarded = [] ;



    // Get the student that owns the Promotion
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Get the pre grade 
    public function fromGrade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }

    // get the current Grade
    public function toGrade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }

    // Get the classroom 
    public function fromClassroom()
    {
        return $this->belongsTo(Classroom::class, 'from_classroom');
    }

    // Get the classroom 
    public function toClassroom()
    {
        return $this->belongsTo(Classroom::class, 'to_classroom');
    }

    // Get the section 
    public function fromSection()
    {
        return $this->belongsTo(Sections::class, 'from_section');
    }

    // Get the section 
    public function toSection()
    {
        return $this->belongsTo(Sections::class, 'to_section');
    }


}
