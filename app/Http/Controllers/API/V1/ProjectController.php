<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectListResource;
use App\Http\Resources\ProjectShowResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return ProjectListResource::collection(Project::all());
    }
    public function show(Project $project){
        return (new ProjectShowResource($project));
    }
    public function store(Request $request){
        $data = $request->all();
        return Project::create($data);
    }
    public function update(Request $request, Project $project){
        $project->update($request->all());
        return $project;
    }
    public function destroy(Project $project){
        $project->delete();
        return 'ok';
    }
}