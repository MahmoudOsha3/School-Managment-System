<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grade ;


class Classroom extends Model
{
    use HasFactory , HasTranslations;
    protected $guarded =[] ;
    public $translatable = ['name'];

    // classrom belongs garde one
    // ىعني الصف الواحد بيخص مرحلة
    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

}
