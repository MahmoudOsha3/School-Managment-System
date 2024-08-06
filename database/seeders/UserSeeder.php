<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User ;
use Hash , DB ;


class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete() ;

        User::create([
            "name"     => "mahmoud osha" ,
            "email"    => "mahmoud@gmail.com" ,
            "password" => Hash::make("123456")
        ]);

        User::create([
            "name"     => "ahmed emad" ,
            "email"    => "ahmed@gmail.com" ,
            "password" => Hash::make("123456")
        ]);
    }
}
