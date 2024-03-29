<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            /*
             *  The roles will be added here, So there is no need to input manually
             *  Just add you role:name and description in below array 
             *      
             * 
             * 
             * 
             *  PLEASE DO NOT DELETE OTHER DATA, MAKE SURE YOU ADD BELOW THE LAST DATA.
             *  
             *  And just run php artisan db:seed without worries, Everything have been taking care for you.
             */
            $roles = array(
                            [
                                'name' =>'superuser', 
                                'description' =>'System root user the whole system' 
                            ],
                            [
                                'name' => 'normal',
                                'description' => 'Low level previledged user'
                            ],
                            [
                                'name' => 'director',
                                'description' => 'Overseing system reports',
                            ],
                            [
                                'name' => 'station master',
                                'description' => 'Responsible for the assigned station'
                            ],
                            [
                                'name' => 'safety worker',
                                'description' => 'Worker responsible for monitoring and ensure safety'
                            ],
                            [
                                'name' => 'locomotive driver',
                                'description' => 'Train operator or driver'
                            ],
                            [
                                'name' => 'train guard',
                                'description' => 'Guarding the train'
                            ],
                            [
                                'name' => 'level crossing watchman',
                                'description' => 'Railway watchman'
                            ]
            );
    
            foreach ($roles as ['name' => $name, 'description' => $description]) 
            {
                $role_exists = DB::table('roles')->where('name', $name)->first();
    
                if($role_exists)
                        continue;
    
                    DB::table('roles')->insert([
                        'name' => $name,
                        'description' => $description,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
            }
        
    }
}
