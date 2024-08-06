<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDegreeQuizze extends Model
{
    use HasFactory;
    protected $fillable = ['student_id' , 'quizze_id','score_quizze' ,'score_student'];



    // الطلاب لديهم العديد من الدرجات
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizze_id');
    }


}
