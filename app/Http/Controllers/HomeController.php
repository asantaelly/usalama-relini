<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Accident;
use App\InspectionChecked;
use App\RiskIdentification;
use App\Task;
use App\Training;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $users = DB::table('users')->where('')
        $users = User::where('is_admin', false)->get();
        $accidents = DB::table('accidents')->get();
        $inspections = DB::table('inspection_checked')->get();
        $tasks = DB::table('tasks')->get();
        $events = DB::table('trainings')->get();

        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $numbers = [20, 40, 60, 80, 100, 120, 140, 160, 180, 200, 220, 240];


        // Tasks Percentages
        $tasks_percent = (int) ($tasks->where('completed', TRUE)->count()/$tasks->count() * 100);


        return view('home', [
            'users' => $users,
            'accidents' => $accidents,
            'inspections' => $inspections,
            'tasks_percent' => $tasks_percent,
            'events' => $events,
            'months' => $months,
            'numbers' => $numbers,
        ]);
    }
}
