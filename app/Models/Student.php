<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasFactory , HasTranslations , Notifiable , HasApiTokens ,SoftDeletes;

    public $translatable = ['name'] ;
    protected $fillable = [ 'name' , 'email' , 'password' , 'academic_year','date_birth' , 'grade_id' ,
                            'classroom_id' , 'section_id' , 'nationalty_id' , 'blood_id' , 'gender_id' , 'parent_id' , 'deleted_at'] ;




    // Get the grade that owns the Student
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // Get the classroom that owns the Student
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    // Get the section that owns the Student
    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    // Get the gender that owns the Student
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // Get the nationaity that owns the Student
    public function nationaity()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalty_id');
    }

    // Get the gender that owns the Student
    public function blood()
    {
        return $this->belongsTo(Type_blood::class, 'blood_id');
    }

    // Get the gender that owns the Student
    public function Myparent()
    {
        return $this->belongsTo(My_Parent::class, 'parent_id');
    }


    // get images and attachements of student => Polymorphic Relationships
    public function images()
    {
        return $this->morphMany(Image::class ,'imageable') ;
    }



    /**
     * Get all of the student_account for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student_account()
    {
        return $this->hasMany(StudentAccounts::class, 'student_id');
    }


    /**
     * Get all of the attendance for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendance()
    {
        return $this->hasMany(AttendanceStudent::class, 'student_id');
    }

}
