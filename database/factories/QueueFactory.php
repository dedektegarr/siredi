<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queue>
 */
class QueueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_antrian' => 'DG' . fake()->unique()->randomNumber(3, true),
            'id_pasien' => 'P-' . fake()->randomNumber(3, true),
            'id_poli' => 'G01' . fake()->randomNumber(2, true),
            'waktu_datang' => now(),
            'status' => true
        ];
    }
}
