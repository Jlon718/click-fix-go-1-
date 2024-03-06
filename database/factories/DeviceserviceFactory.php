<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deviceservice>
 */
class DeviceserviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device_id' => $this->faker->numberBetween(1,4),
            'device_type' => $this->faker->word(),
            'Service_id' => $this->faker->numberBetween(1,6),
            'service_type' => $this->faker->word(),
        ];
    }
}
