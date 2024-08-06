<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization ;
use DB ;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        DB::table('specializations')->delete();

        $specialization = [
            ['en' => 'Arabic' , 'ar' => 'اللغة العربية'],
            ['en' => 'English' , 'ar' => 'اللغة الانجليزية'],
            ['en' => 'Franch' , 'ar' => 'اللغة الفرنسية'],
            ['en' => 'High English' , 'ar' => 'مستوي رقيع'],
            ['en' => 'Science' , 'ar' => 'علوم'],
            ['en' => 'Math' , 'ar' => 'حساب'],
            ['en' => 'Religion' , 'ar' => 'تربية الدينية'],
        ];

        foreach ($specialization as $special) {
            Specialization::create([
                'name' => $special
            ]);
        }


    }
}
