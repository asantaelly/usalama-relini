<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InjurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $injuries = [
            ['nature' =>'FOUND INJURED ON THE TRACK'],
            ['nature' => 'WAGONS RUNAWAY'],
            ['nature' =>'PERSON KNOCKED TROLLEY'],
            ['nature' => 'PERSON KNOCKED TRAIN'],
            ['nature' =>'CATTLE ATTENDANT KNOCKED TRAIN'],
            ['nature' => 'MOTOR CYCLE KNOCKED TRAIN'],
            ['nature' =>'CATTLES KNOCKED TRAIN'],
            ['nature' => 'UNKNOWN PERSON ATTACKED DRIVER'],
            ['nature' =>'ROAD VEHICLE KNOCKED TRAIN'],
            ['nature' => 'ROAD VEHICLE KNOCKED TROLLEY'],
            ['nature' => 'CATTLE ATTENDANT INJURED CASUAL LABOURER'],
        ];

        foreach ($injuries as ['nature' => $nature]) 
        {
        $injury_exists = DB::table('injuries')->where('nature', $nature)->first();

        if($injury_exists)
                continue;

            DB::table('injuries')->insert([
                'nature' => $nature,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
