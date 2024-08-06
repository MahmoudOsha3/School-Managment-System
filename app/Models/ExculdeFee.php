<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExculdeFee extends Model
{
    use HasFactory;

    protected $guarded = [] ;


    /**
     * Get the student that owns the ExculdeFee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    
}
