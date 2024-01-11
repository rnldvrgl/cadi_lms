<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\cadi_book;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         cadi_book::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        cadi_book::factory()
        DB::table('cadi_books')->insert([
            'book_title'=> fake()->realText(),
            'book_author' => fake()->name(),
            'book_date_published' => Carbon::parse('2000-01-01'),
            'date_receive' => Carbon::parse('2000-01-01'),
            'is_barrowed' => 0,
        ]);
    }
}
