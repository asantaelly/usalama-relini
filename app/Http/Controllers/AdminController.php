<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function manage_users()
    {
        $users = User::where('is_admin', false)->get();

        return view('dashboard.admin.manage_users')->with([
            'users' => $users,
        ]);
    }

    
    public function manage_user($id){

        $user = User::find($id);
        $roles = DB::table('roles')->where('name', '!=', 'superuser')->get();

        return view('dashboard.admin.manage_user')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function assign_roles(Request $request, $id)
    {
        $user = User::find($id);
        $roles = DB::table('roles')->where('name', '!=', 'superuser')->get();

        $get_roles = $request->input('roles.*.id');

        if(empty($get_roles)){
            return redirect()->route('manage.user', [$user])
                ->with([
                    'status' =>'User roles couldn\'t be updated!',
                    'user' => $user,
                    'roles' => $roles
                ]);
        }

        foreach ($get_roles as $role_id) {
            
            DB::table('user_role')->insert([
                'role_id' => $role_id,
                'user_id' => $user->id,
            ]);
            
        }

        return redirect()->route('manage.user', [$user])
                ->with([
                    'status' =>'User roles updated successfully',
                    'user' => $user,
                    'roles' => $roles
                ]);
        
    }

    public function add_user(){

        $roles = DB::table('roles')->where([
            ['name', '!=', 'superuser'], 
            ['name', '!=', 'normal'],
            ])->get();

        return view('dashboard.admin.create_user')->with([
            'roles' => $roles,
        ]);
    }

    public function store_user(Request $request)
    {

            // return dd($request);

            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'last_name' => 'required|string|max:255',
            //     'email' => 'required|string|email|max:255|unique:users',
            //     'password' => 'required|string|min:8|confirmed',
            //     'phone_number' => 'required|max:255',
            //     'address' => 'required|max:255',
            //     'role' => 'required',
            //     'competence' => 'required|string',
            //     'medical' => 'required|string',
            // ]);

        
        $educations = $request->input('education.*.level');
        $qualifications = $request->input('qualify.*.need');
        $roles = $request->input('roles.*.id');

        $user_id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        foreach($roles as $role) {

            DB::table('user_role')->insert([
                'role_id' => $role,
                'user_id' => $user_id,
            ]);
        }

        $profile_id = DB::table('worker_profiles')->insertGetId([
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'competence' => $request->competence,
            'medical' => $request->medical,
            'user_id' => $user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        foreach($educations as $education) {

            DB::table('worker_educations')->insert([
                'worker_profile_id' => $profile_id,
                'level' => $education,
            ]);
        }

        foreach ($qualifications as $quality) {
            
            DB::table('worker_qualifications')->insert([
                'worker_profile_id' => $profile_id,
                'quality' => $quality,
            ]);
        }

        return redirect()->route('manage.user', ['id' => $user_id]);    
    }

    public function edit_user($id) {

        $user = User::find($id);

        $roles = DB::table('roles')->where([
            ['name', '!=', 'superuser'], 
            ['name', '!=', 'normal'],
            ])->get();

        return view('dashboard.admin.edit')->with([
            'roles' => $roles,
            'user' => $user,
        ]);

    }


    public function update_user(Request $request, $id)
    {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone_number' => ['required', 'max:255', ''],
                'address' => ['required', 'max:255'],
                'role' => ['required',],
                'competence' => ['required', 'string'],
                'medical' => ['required', 'string'],
            ]);

        
        $educations = $request->input('education.*.level');
        $qualifications = $request->input('qualify.*.need');
        $roles = $request->input('role.*.id');

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        // return dd($roles);


        foreach($roles as $role) {

            DB::table('user_role')->where('user_id', $id)->updateOrInsert([
                'role_id' => $role,
                'user_id' => $id
            ]);
        }

        DB::table('worker_profiles')->where('user_id', $id)->update([
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'competence' => $request->competence,
            'medical' => $request->medical,
            'user_id' => $id,
            'updated_at' => Carbon::now(),
        ]);

        $profile = DB::table('worker_profiles')->where('user_id', $id)->first();

        foreach($educations as $education) {

            DB::table('worker_educations')->where('worker_profile_id', $profile->id)->updateOrInsert([
                'worker_profile_id' => $profile->id,
                'level' => $education,
            ]);
        }

        foreach ($qualifications as $quality) {
            
            DB::table('worker_qualifications')->where('worker_profile_id', $profile->id)->updateOrInsert([
                'worker_profile_id' => $profile->id,
                'quality' => $quality,
            ]);
        }

        return redirect()->route('manage.user', ['id' => $id]);    
    }


}
