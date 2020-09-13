<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Project;
use App\Task;


class ProjectController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {

        $projects = Project::all() ;
        return view('project.projects')->with('projects', $projects) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects_count = Project::count() ;
      
        if ( $projects_count < 10  ) {  
            
            $this->validate( $request, [
                'project' => 'required'
            ] ) ;        
    
            $project_new = new Project;
            $project_new->project_name = $request->project;
            $project_new->save() ;
            Session::flash('success', 'Project Created') ;
            return redirect()->route('project.index') ;
        }
        
        else {
            Session::flash('info', 'Please delete some projects, Demo max: 10') ;
            return redirect()->route('project.index') ;          
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_project =  Project::find($id);
        return view('project.edit')->with('edit_project', $edit_project)  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_project = Project::find($id) ;
        $update_project->project_name = $request->name;
        $update_project->save() ;
        Session::flash('success', 'Project was sucessfully edited') ;
        return redirect()->route('project.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_project = Project::find($id) ;
        $delete_project->delete() ;
        Session::flash('success', 'Project was deleted and tasks associated with it') ;
        return redirect()->back();        
        
    }

}
