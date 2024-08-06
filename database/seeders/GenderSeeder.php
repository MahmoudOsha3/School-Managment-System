<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender ;
use DB ;

class GenderSeeder extends Seeder
{

    public function run()
    {
        DB::table('genders')->delete();

        Gender::create([
            'name' => ['ar' => 'ذكر' , 'en' => 'Male' ]
        ]);

        Gender::create([
            'name' => ['ar' => 'انثي' , 'en' => 'Female']
        ]);
    }
}
