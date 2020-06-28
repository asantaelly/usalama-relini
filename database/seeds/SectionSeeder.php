<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name' =>'A',
                'between' => 'DSM-MAI',
                'kilometers' => 1,
                'rail_size' => '60.00lbs',
                'code_name' => 'A-DSM-MAI'
            ],
            [
                'name' =>'A',
                'between' => 'KAT-PUG',
                'kilometers' => 9,
                'rail_size' => '80.00lbs',
                'code_name' => 'A-KAT-PUG'
            ],
            [
                'name' =>'B',
                'between' => 'GGD-GLW',
                'kilometers' => 16,
                'rail_size' => '80.00lbs',
                'code_name' => 'B-GGD-GLW'
            ],
            [
                'name' =>'B',
                'between' => 'GLW-MSG',
                'kilometers' => 17,
                'rail_size' => '80.00lbs',
                'code_name' => 'B-GLW-MSG'
            ],
           
        ];

        foreach ($sections as ['name' => $name, 'between' => $between, 'kilometers' => $kilometers, 'rail_size' => $rail_size, 'code_name' => $code_name]) 
        {
        $injury_exists = DB::table('sections')->where('name', $name)
                            ->where('kilometers', $kilometers)
                            ->where('rail_size', $rail_size)
                            ->where('code_name', $code_name)->first();

        if($injury_exists)
                continue;

            DB::table('sections')->insert([
                'name' => $name,
                'between' => $between,
                'kilometers' => $kilometers,
                'rail_size' => $rail_size,
                'code_name' => $code_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
