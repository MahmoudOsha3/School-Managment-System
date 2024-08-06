<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Specialization ;
use App\Models\Sections ;
use App\Models\Gender ;



class Teacher extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasTranslations , HasApiTokens, Notifiable;

    public $translatable = ['name'] ;
    protected $fillable =['name' , 'email' , 'password', 'address' , 'joining_date' , 'specialization_id' , 'gender_id'] ;



    //  Get the special that owns the Teacher

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'id');
    }

    //  Get the gender that owns the Teacher
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'id');
    }

    // The sections that belong to the Teacher (Many TO Many)
    public function sections()
    {
        return $this->belongsToMany(Sections::class, 'teacher_section','teacher_id' , 'section_id');
    }


}
