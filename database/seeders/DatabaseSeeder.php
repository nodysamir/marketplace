<?php

namespace Database\Seeders;

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
        $this->call(CountryTableSseeder::class);
        $this->call(StatTableSseeder::class);
        $this->call(CityTableSseeder::class);
        $this->call(UserTableSseeder::class);
    }
}
