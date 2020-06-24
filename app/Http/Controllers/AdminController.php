<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

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


}
