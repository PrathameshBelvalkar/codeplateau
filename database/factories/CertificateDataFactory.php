<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CertificateData>
 */
class CertificateDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'certificate_name' => $certificateName = $this->faker->randomElement([
                'React JS',
                'Node JS',
                'Python',
                'Django',
                'Laravel',
                'Vue JS',
                'Flutter',
                'Swift',
                'Kotlin',
                'Angular',
                'Rust',
                'Go',
                'TypeScript'
            ]),
            'course_code' => strtoupper(str_replace(' ', '-', $certificateName)) . '-' . $this->faker->numerify('####'),
        ];

    }
}
