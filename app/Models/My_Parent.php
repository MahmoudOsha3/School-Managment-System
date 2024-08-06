<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;


class My_Parent extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , HasTranslations;

    public $translatable = ['Name_Father' , 'Job_Father' , 'Name_Mother' , 'Job_Mother'] ;
    protected $guarded = [] ;


}
