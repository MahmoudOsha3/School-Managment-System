<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Student , My_Parent };
use Hash , DB ;

class StudentParentSeeder extends Seeder
{

    public function run()
    {
        // DB::table('my__parents')->delete() ;
        // DB::table('students')->delete() ;
        // parent
        // for ($i=1 ; $i <= 10000  ; $i++)
        // {
        //     My_Parent::create([
        //         'Name_Father' => ['ar' => "محمود$i عادل صلاح ", 'en' =>"Mahmoud_$i Adel Salah"],
        //         'Job_Father' => ['ar' => 'مهندس' , 'en' => 'Engineer' ],
        //         'email' => "mahmoud_$i@gmail.com" ,
        //         'password' => Hash::make('123456789') ,
        //         'National_ID_Father' => '3030422160' ,
        //         'Passport_ID_Father' => '3030422160' ,
        //         'Phone_Father' => '01261978377',
        //         'Nationality_Father_id' => 5 ,
        //         'Blood_Type_Father_id' => 2 ,
        //         'Religion_Father_id' => 1 ,
        //         'Address_Father' => 'Masr Elgadeda in Cairo' ,

        //         // mother info
        //         'Name_Mother' => ['ar' => 'سارة حامد محمد' , 'en' => 'Sara ahmed mohammed'],
        //         'Job_Mother' => ['ar' => 'ربة منزل' , 'en' => 'Mother home' ],
        //         'National_ID_Mother' => '3023425143' ,
        //         'Passport_ID_Mother' => '3029765143' ,
        //         'Phone_Mother' => '01501664734',
        //         'Nationality_Mother_id' => 20 ,
        //         'Blood_Type_Mother_id' => 3 ,
        //         'Religion_Mother_id' => 1 ,
        //         'Address_Mother' => 'Masr Elgadeda in Cairo'  ,
        //     ]);
        // }

        // students
        // for ($i= 101 ; $i  <= 200  ; $i++ ) {
        //     Student::create([
        //         'name' => ['en' => "Emad_$i Mohammed Adel Ibrahim" , 'ar' => "عماد$i سمير عادل ابراهيم "],
        //         'email' => "hossam_$i@gmail.com" ,
        //         'password' => Hash::make('123456789') ,
        //         'date_birth' => '2003-07-03' ,
        //         'academic_year' => '2024' ,
        //         'grade_id' => 3 ,
        //         'classroom_id' => random_int(5,7),
        //         'section_id' => random_int(4,6) ,
        //         'nationalty_id' => 20,
        //         'blood_id' => 2 ,
        //         'gender_id' => 1 ,
        //         'parent_id' => random_int(9,2348)
        //     ]);
        // }
    }
}
