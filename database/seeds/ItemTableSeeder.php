<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parts = array(

            "Rails" =>  array(
                "Rail size",
                "Welded rail"
            ),

            "Earth Work" =>  array(
                "Ballast",
                "On ways",
                "Formation",
                "Soil erosion",
            ),

        );
        

        foreach ($parts as $key => $values) 
        {
            $part_id = DB::table('inspection_parts')->where('title', $key)->value('id');

            if(empty($part_id)){
                continue;
            }
            
            
            // {

            //     $part_id = DB::table('inspection_parts')->insertGetId([
            //         'title' => $key,
            //         'created_at' => Carbon::now(),
            //         'updated_at' => Carbon::now(),
            //     ]);
            // }

            // if(empty($values)){
            // break;
            // }

            foreach ($values as $sub_value) {
                
                $item_exists = DB::table('checklist_items')->where('item', $sub_value)->first();

                if($item_exists)
                    continue;

                    DB::table('checklist_items')->insert([
                            'item' => $sub_value,
                            'inspection_part_id' => $part_id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
            }

        }
    }
}
