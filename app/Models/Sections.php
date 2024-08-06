<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grade ;
use App\Models\Teacher ;
use App\Models\Classroom ;


class Sections extends Model
{
    use HasFactory , HasTranslations ;
    protected $guarded = [] ;
    public $translatable = ['name'];

    // المرحلة
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // الصف
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    // The teacher that belong to the Sections (Many TO Many)
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section' , 'section_id' , 'teacher_id');
    }



}
