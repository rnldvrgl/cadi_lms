<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('cadi_books')->insert([
            'accesson_number'=> random_int(00000, 99999),
            'title' => $faker->sentence(3),
            'author' => $faker->name(),
            'place_of_publication' => $faker->address,
            'publisher' => $faker->company,
            'copyright'=> $faker->numberBetween(2005, date('Y')),
            'date_added' => date('Y-m-d')
        ]);
    }
}
