<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

class InspectionPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = array(

                    "Track Inspection" =>  array(
                        "Rails",
                    ),

                    "Locomotive and Wagon Inspection" =>  array(
                        "Trailer",
                    ),
                );
                

                foreach ($sections as $key => $values) 
                {
                    $section_id = DB::table('inspection_sections')->where('title', $key)->value('id');

                    if(empty($section_id)){

                        $section_id = DB::table('inspection_sections')->insertGetId([
                            'title' => $key,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }

                    if(empty($values)){
                    break;
                    }

                    foreach ($values as $sub_key => $sub_value) {
                        
                        $part_exists = DB::table('inspection_parts')->where('title', $sub_value)->first();

                        if($part_exists)
                            continue;

                            DB::table('inspection_parts')->insert([
                                    'title' => $sub_value,
                                    'inspection_section_id' => $section_id,
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now(),
                                ]);
                    }

                }
    }
}
