<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
            'Safety',
            'Infrastructure',
            'Rolling Stock',
            'Traffic',
            'Telecom $ ICT',
            'Risk Management'
        );

                foreach ($departments as $department) 
                {
                $department_exists = DB::table('departments')->where('name', $department)->first();

                if($department_exists)
                        continue;

                    DB::table('departments')->insert([
                        'name' => $department,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
    }
}
