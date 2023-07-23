<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->randomNumber(8),
            'user_id' => null, // You can modify this as needed
            'billing_firstname' => $this->faker->firstName,
            'billing_lastname' => $this->faker->lastName,
            'billing_email' => $this->faker->email,
            'billing_phone' => $this->faker->phoneNumber,
            'billing_address' => $this->faker->streetAddress,
            'billing_city' => $this->faker->city,
            'billing_postalcode' => $this->faker->postcode,
            'billing_country' => $this->faker->countryCode,
            'shipping_firstname' => null, // You can modify this as needed
            'shipping_lastname' => null, // You can modify this as needed
            'shipping_email' => null, // You can modify this as needed
            'shipping_phone' => null, // You can modify this as needed
            'shipping_address' => null, // You can modify this as needed
            'shipping_city' => null, // You can modify this as needed
            'shipping_postalcode' => null, // You can modify this as needed
            'shipping_country' => null, // You can modify this as needed
            'tax' => 0,
            'discount' => 0,
            'total' => 0,
            'status' => $this->faker->randomElement(['Failed', 'Pending', 'Processing', 'Delivering', 'Completed']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            ];
    }
}
