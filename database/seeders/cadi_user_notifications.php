<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cadi_user_notifications extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        DB::table('cadi_user_notifications')->insert([
            'user_id'=> 1,
            'notif_message' => $faker->paragraph(20),
            'notif_title' => $faker->name(),
            'notif_redirect'=> $faker->url(),
            'date_created' => date('Y-m-d'),
            'time_created'=>date('H:i:s')
        ]);

    }
}
