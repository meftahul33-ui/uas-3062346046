<?php

namespace Database\Factories;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata>
 */
class BiodataFactory extends Factory
{
    protected $model = Biodata::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nim' => $this->faker->unique()->numerify('##########'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'riwayat_pendidikan' => $this->faker->randomElements(['MI Miftahul Huda', 'MTS N Srono BWI', 'SMU Islam Lumajang', 'S1 Universitas Muhammadiyah'], 2),
            'hobby' => $this->faker->word(),
            'alamat_web' => $this->faker->url(),
            'deskripsi_diri' => $this->faker->paragraph(),
            'foto' => null,
        ];
    }
}