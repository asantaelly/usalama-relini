<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Training;
use App\Attendance;


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

    // Return a single instance
    public function show($id) {

        $event = Training::find($id);

        return view('training/show', [
            'event' => $event,
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


    // Edit Training Instance
    public function edit($id) {

        $event = Training::find($id);
        $time = Carbon::now();
        $roles = DB::table('roles')->where([
            ['name', '!=', 'superuser'], 
            ['name', '!=', 'normal'],
            ])->get();

        return view('training/edit', [
            'roles' => $roles,
            'time' => $time,
            'event' => $event,
        ]);

    }

    // Store Edited Instance
    public function update(Request $request, $id) {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'role_id' => 'required',
            'venue' => ['required', 'string', 'max:255'],
            'training_date' => 'required|date',
        ]);

        $event = Training::find($id);
        DB::table('trainings')->where('id', $event->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'role_id' => $request->role_id,
            'venue' => $request->venue,
            'training_date' => $request->training_date,
            'user_id' => Auth::id(),
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('training.show', [ 'id' => $event->id]);
    }

    // Delete Instance
    public function delete($id) {

        DB::table('trainings')->where('id', $id)->delete();
        return redirect()->route('training.index');
    }


    public function index_attendance() {

        $events = Training::all();

        return view('training/operation/index', [
            'events' => $events,
        ]);
        
    }

    public function show_attendance($id) {

        $event = Training::find($id);
        $attendances = Attendance::where('training_id', $id)->get();

        return view('training/operation/show', [
            'event' => $event,
            'attendances' => $attendances
        ]);
    }

    public function store_attendance(Request $request) {

        
        $event = Training::find($request->training_id);

        $attendances = $request->input('attendance.*.status');
        $users = $request->input('users.*.id');
        $users_attendances = array_combine($users, $attendances);

        if ($users_attendances == FALSE) {
            return redirect()->route('operation.show', [$event]);
        }

        

        foreach($users_attendances as $user_id => $attendance_status) {

            $attendance = DB::table('attendances')->where([
                ['user_id', $user_id],
                ['training_id', $request->training_id],
                ])->first();


            if($attendance != NULL ) {
                
                DB::table('attendances')->where([
                        ['user_id', $user_id],
                        ['training_id', $request->training_id],
                    ])->update([
                    'status' => $attendance_status,
                    'updated_at' => Carbon::now(),
                ]);
            } else {

                DB::table('attendances')->insert([
                    'user_id' => $user_id,
                    'training_id' => $request->training_id,
                    'status' => $attendance_status,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        return redirect()->route('operation.show', [$event]);

    }


}
