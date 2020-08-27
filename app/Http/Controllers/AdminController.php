<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Show a view to manage users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function manage_users()
    {
        $users = User::where('is_admin', false)->get();

        return view('dashboard.admin.manage_users')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show a view to manage users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'max:255', ''],
            'address' => ['requied', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'competence' => ['required', 'string', 'max:255'],
            'medical' => ['require', 'string'],
        ]);

        $educations = $request->input('education.*.level');
        $qualifications = $request->input('qualify.*.need');

        $worker = new User;
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->password = Hash::make($request->password);
        $worker->save();

        DB::table('user_role')->insert([
            'role_id' => $request->role,
            'user_id' => $worker->id,
        ]);

        
    }


}
