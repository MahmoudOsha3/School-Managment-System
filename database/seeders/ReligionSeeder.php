<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;
use DB ;

class ReligionSeeder extends Seeder
{

    public function run()
    {
        DB::table('religions')->delete();

        $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];

        foreach ($religions as $religion) {
            Religion::create(['name' => $religion]);
        }
    }
}
