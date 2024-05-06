<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return(json_encode($projects));
    }

    public function store(Request $request) {
        Project::create($request->all());
        return(json_encode('created'));
    }

    public function update(Request $request, $id) {
        $project = Project::find($id);
        $project->update($request->all());
        return(json_encode('updated'));
    }

    public function delete($id) {
        //$project = Project::find($id);
        Project::destroy($id);
        return(json_encode('deleted'));
    }
}
