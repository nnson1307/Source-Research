<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('testing', 'development', 'local')) {
            \App\Models\Customers::factory(20)->create();
        }
    }
}
