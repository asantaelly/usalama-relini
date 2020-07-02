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
        $this->call(DeathSeeder::class);
        $this->call(InjurySeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(InspectionPartSeeder::class);
    }
}
