<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deaths = [
                ['nature' =>'FOUND DEAD ON THE TRACK'],
                ['nature' => 'WAGONS RUNAWAY'],
                ['nature' =>'PERSON KNOCKED TROLLEY'],
                ['nature' => 'PERSON KNOCKED TRAIN'],
                ['nature' =>'TRAIN KNOCKED BY MALE'],
                ['nature' => 'TRAIN KNOCKED BY FEMALE'],
                ['nature' =>'CATTLES KNOCKED TRAIN'],
                ['nature' => 'FOUND DEAD IN THE TRAIN'],
                ['nature' =>'ROAD VEHICLE KNOCKED TRAIN'],
                ['nature' => 'FOUND DEAD AT RAILWAY PREMISES'],
            ];

            foreach ($deaths as ['nature' => $nature]) 
            {
            $death_exists = DB::table('deaths')->where('nature', $nature)->first();

            if($death_exists)
                    continue;

                DB::table('deaths')->insert([
                    'nature' => $nature,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
    }
}
