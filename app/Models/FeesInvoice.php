<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesInvoice extends Model
{
    use HasFactory;

    protected $guarded = [] ;


    /**
     * Get the student that owns the FeesInvoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get the grade that owns the FeesInvoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }



    /**
     * Get the classroom that owns the FeesInvoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }


    // for get type of fee
    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }


}
