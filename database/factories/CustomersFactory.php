<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numberPrefixes = ['0812', '0813', '0814', '0815', '0816', '0817', '0818', '0819', '0909', '0908'];

        return [
            'full_name' => $this->faker->name(),
            'phone' => $numberPrefixes[array_rand($numberPrefixes)] . $this->randomNumberSequence(),
            'birthday' => Carbon::today()->subDays(rand(0, 180))->format('Y-m-d')
        ];
    }

    /**
     * Random 7 number
     *
     * @param $requiredLength
     * @param $highestDigit
     * @return mixed|void
     */
    function randomNumberSequence($requiredLength = 6, $highestDigit = 8) {
        $sequence = '';
        for ($i = 0; $i < $requiredLength; ++$i) {
            $sequence .= mt_rand(0, $highestDigit);
        }
        return $sequence;
    }
}
