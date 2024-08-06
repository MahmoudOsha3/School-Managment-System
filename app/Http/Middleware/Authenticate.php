<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request ;

class Authenticate extends Middleware
{
    // هذا الميدل وير اذا كان تسجيل الدخول غير شرعي يرجع الي الصفحة اللي انا عايزها بحيث ان ما يكون في لوجين بيعبت السيشن في جسون لو مرجعش ب جسون يطلع بره خالص دمه معني الكود
    protected function redirectTo($request)
    {
        if (! $request->expectsJson())
        {
            if(Request::is( app()->getLocale() . '/student/dashboard'))
            {
                return route('selection') ;
            }
            elseif(Request::is( app()->getLocale() . '/teacher/dashboard'))
            {
                return route('selection') ;
            }
            elseif(Request::is( app()->getLocale() . '/parent/dashboard'))
            {
                return route('selection') ;
            }
            else
            {
                return route('selection') ;
            }
        }
    }
}
