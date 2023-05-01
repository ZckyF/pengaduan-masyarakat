<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * The name of the model being generated.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'email' => str_replace('example.com', 'gmail.com', $this->faker->unique()->safeEmail()),
            'nik' => $this->faker->unique()->randomNumber(8),
            'judul' => $this->faker->sentence(),
            'aduan' =>  collect($this->faker->paragraphs(mt_rand(3,7)))->map(fn ($p) => "$p")->implode(''),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
