<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('pasien')->insert([
                'nama' => $faker->name,
                'usia' => $faker->numberBetween(1, 100),
                'gender' => $faker->randomElement(['P', 'L']),
                'diagnosis' => 'diagnosis/' . $faker->image('public/storage/diagnosis', 640, 480, null, false),
            ]);
        }
    }
}
