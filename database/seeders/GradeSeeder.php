<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade ;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::truncate();
        
        Grade::create([
            'name' => ['en' => 'KG Stage' , 'ar' => 'المرحلة التمهيدية'] ,
        ]);
        Grade::create([
            'name' => ['en' => 'Primary Stage' , 'ar' => 'المرحلة الابتدائية'] ,
        ]);
        Grade::create([
            'name' => ['en' => 'Middle  Stage' , 'ar' => 'المرحلة الاعدادية'] ,
        ]);
        Grade::create([
            'name' => ['en' => 'Hight Stage' , 'ar' => 'المرحلة الثانوية'] ,
        ]);
    }
}
