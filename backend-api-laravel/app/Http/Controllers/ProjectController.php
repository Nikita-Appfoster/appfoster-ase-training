<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($user_id)
    {
        $user = User::find($user_id);
        $projects = $user->getProjects;
        return view('project.index', compact('user', 'projects'));
    }
    public function add(Request $request, $user_id)
    {
        Project::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'body' => $request->body,

        ]);
        $user = User::find($user_id);
        $projects = $user->getProjects;
        return view('project.index', compact('projects', 'user'));
    }

    public function create($id)
    {
        $user = User::find($id);
        return view('project.create', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $project->update($request->all());

        $user = User::find($project->user_id);

        $projects = Project::where('user_id', $user->id)->get(); 

       
        return view('project.index', compact('projects', 'user'));
    }

    public function destroy($id) {
        $project = Project::find($id); 
    
      
        $user = User::findOrFail($project->user_id); 
    
       
        $project->delete();
    
     
        $projects = Project::where('user_id', $user->id)->get(); 
    
       
        return view('project.index', compact('user', 'projects'));
    }
    


}
