<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_buku' => $this->faker->sentence,
            'kode_buku' => 'BP-' . $this->faker->unique()->randomNumber(6),
            'jumlah' => $this->faker->randomNumber(1),
        ];
    }
}
