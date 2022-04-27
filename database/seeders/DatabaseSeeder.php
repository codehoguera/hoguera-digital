<?php

namespace Database\Seeders;

use App\Models\Regional;
use Illuminate\Database\Seeder;
use LDAP\Result;

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
        $this->call([
            UserSeeder::class,
            RegionalSeeder::class,
            UserDateSeeder::class,
        ]);
    }
}
