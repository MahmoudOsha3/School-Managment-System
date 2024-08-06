<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Type_blood ;

class BloodSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_bloods')->delete() ;

        $bloods = ['O+','O-','A+','A-','B+','B-','AB+','AB-'];
        foreach($bloods as $blood)
        {
            Type_blood::create(['name' => $blood]);
        }
    }
}
