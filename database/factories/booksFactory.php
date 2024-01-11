<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cadi_user>
 */
class booksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_title'=> $this->faker->title(),
            'book_author' => $this->faker->name(),
            'book_date_published' => Carbon::parse('2000-01-01'),
            'date_receive' => Carbon::parse('2000-01-01'),
            'is_barrowed' => 0,
            'action_btn' => '<button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>'
        ];
    }
}
