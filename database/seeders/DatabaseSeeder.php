<?php

namespace Database\Seeders;

use App\Models\Commentary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);

        Commentary::factory(50)->create();
    }
}
