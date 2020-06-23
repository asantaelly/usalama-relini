<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

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

        return view('dashboard.admin.manage_user')->with([
            'user' => $user
        ]);
    }


}
