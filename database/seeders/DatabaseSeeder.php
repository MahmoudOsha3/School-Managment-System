<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User ;
use App\Models\Post ;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(30)->create();
        // \App\Models\Post::factory(20)->create();

        $this->call([
            UserSeeder::class,
            // GradeSeeder::class,
            ClassroomSeeder::class,
            NationalitiesSeeder::class ,
            BloodSeeder::class ,
            ReligionSeeder::class,
            GenderSeeder::class,
            SpecializationSeeder::class,
            SettingSeeder::class
        ]);


        // $this->call([
        //     UserSeeder::class
        // ]);
    }
}
