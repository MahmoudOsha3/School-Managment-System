<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Classroom , Grade} ;
class ClassroomSeeder extends Seeder
{

    public function run()
    {
        // Classroom::truncate() ;

        $grade_kg = Grade::create([
            'name' => ['en' => 'KG Stage' , 'ar' => 'المرحلة التمهيدية'] ,
        ]);
        $grade_pr = Grade::create([
            'name' => ['en' => 'Primary Stage' , 'ar' => 'المرحلة الابتدائية'] ,
        ]);
        $grade_Md = Grade::create([
            'name' => ['en' => 'Middle  Stage' , 'ar' => 'المرحلة الاعدادية'] ,
        ]);
        $grade_Hg = Grade::create([
            'name' => ['en' => 'Hight Stage' , 'ar' => 'المرحلة الثانوية'] ,
        ]);

        $classrooms = [
            [
                'name' => ['en' => 'First grade' , 'ar' =>'الصف الاول' ] ,
                'grade_id' => $grade_pr->id
            ],

            [
                'name' => ['en' => 'Second grade' , 'ar' =>'الصف الثاني' ] ,
                'grade_id' => $grade_pr->id
            ],

            [
                'name' => ['en' => 'Third grade' , 'ar' =>'الصف الثالث' ] ,
                'grade_id' => $grade_pr->id
            ],

            [
                'name' => ['en' => 'Foutrh grade' , 'ar' =>'الصف الرابع' ] ,
                'grade_id' => $grade_pr->id
            ],

            [
                'name' => ['en' => 'First grade' , 'ar' =>'الصف الاول' ] ,
                'grade_id' => $grade_Md->id
            ],

            [
                'name' => ['en' => 'Second grade' , 'ar' =>'الصف الثاني' ] ,
                'grade_id' => $grade_Md->id
            ],

            [
                'name' => ['en' => 'Third grade' , 'ar' =>'الصف الثالث' ] ,
                'grade_id' => $grade_Md->id
            ],

            [
                'name' => ['en' => 'First grade' , 'ar' =>'الصف الاول' ] ,
                'grade_id' => $grade_Hg->id
            ],

            [
                'name' => ['en' => 'Second grade' , 'ar' =>'الصف الثاني' ] ,
                'grade_id' => $grade_Hg->id
            ],

            [
                'name' => ['en' => 'Third grade' , 'ar' =>'الصف الثالث' ] ,
                'grade_id' => $grade_Hg->id
            ],
        ] ;

        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }
    }
}
