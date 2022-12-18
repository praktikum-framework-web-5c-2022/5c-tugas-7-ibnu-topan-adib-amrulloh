<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   
    public function index()
    {
        $projects = Project::with('users')->get();
        return view('project.index', compact('projects'));
    }

   
    public function create()
    {
        $users = User::all();
        
        return view('project.create',compact('users'));
    }

    public function store(Request $request ){
        $project = Project::create([
            'name' => $request->project
        ]);

        $project->users()->attach($request->name,['groupleader_id' => User::inRandomOrder()->first()->id]);
        return redirect()->route('projects.index');


    }

    public function edit(Project $project){
        $users = User::all();
        return view('project.edit',compact('users','project'));
    }

    public function update(Request $request ,Project $project){
        // $project = Project::where('id', $project->id)->update([
        //     'name' => $request->project
        // ]);
        $project_data = [
            'name' => $request->project
        ];

        $project->users()->sync($request->name,['groupleader_id' => User::inRandomOrder()->first()->id]);

        $project->update($project_data);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project){
        Project::destroy($project->id);
        return redirect()->route('projects.index');
    }

   
}
