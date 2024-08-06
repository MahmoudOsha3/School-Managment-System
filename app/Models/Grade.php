<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Sections ;

class Grade extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = ['name' , 'notes'] ;
    public $translatable = ['name'];

    public function sections()
    {
        return $this->hasMany(Sections::class, 'grade_id');
    }

}
