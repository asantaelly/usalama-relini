<?php

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
        $this->call(RoleSeeder::class);
        $this->call(deathSeeder::class);
        $this->call(InjurySeeder::class);
        $this->call(SectionSeeder::class);
    }
}
