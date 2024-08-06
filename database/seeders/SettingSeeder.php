<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting ;
use DB ;

class SettingSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete() ;
        $data = [
            ['key' => 'current_session', 'value' => '2024-2025'],
            ['key' => 'school_title', 'value' => 'CIS'],
            ['key' => 'school_name', 'value' => 'El Continental International School'],
            ['key' => 'end_first_term', 'value' => '01-12-2024'],
            ['key' => 'end_second_term', 'value' => '01-03-2025'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'El Obour Rd , Cairo'],
            ['key' => 'school_email', 'value' => 'Continental@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];
        DB::table('settings')->insert($data);
    }
}
