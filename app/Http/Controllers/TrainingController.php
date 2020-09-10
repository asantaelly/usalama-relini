<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Training;


class TrainingController extends Controller
{


    public function __construct() {

        $this->middleware('auth');
    }

    // Return all Training Instances
    public function index() {

        $events = Training::all();

        return view('training/index', [
            'events' => $events,
        ]);
    }

    // Create Training Instance
    public function create() {

        $time = Carbon::now();
        $roles = DB::table('roles')->where([
            ['name', '!=', 'superuser'], 
            ['name', '!=', 'normal'],
            ])->get();

        return view('training/create', [
            'roles' => $roles,
            'time' => $time,
        ]);
    }


    // Store Training Instance
    public function store(Request $request) {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'role_id' => 'required',
            'venue' => ['required', 'string', 'max:255'],
            'training_date' => 'required|date',
        ]);

        DB::table('trainings')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'role_id' => $request->role_id,
            'venue' => $request->venue,
            'training_date' => $request->training_date,
            'user_id' => Auth::id(),
            'status' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('training.index');
    }
}
