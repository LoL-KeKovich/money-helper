<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    public $token;
    public $user;

    function __construct() {
        $this -> token = request()->bearerToken();
        $this -> user = auth()->user();
    }

    public function index() {
        if($this->user['role'] == 'admin' && isset($this->token)) {
            $projects = Project::all();
            return(json_encode($projects));
        } elseif($this->user['role'] == "user" && isset($this->token)) {
            $projects = Project::where('author', $this->user['email'])->get();
            return(json_encode($projects));
        } else {
            return(json_encode('something went wrong'));
        }
    }

    public function getAll() {
        $projects = Project::all();
        return(json_encode($projects));
    }

    public function store(Request $request) {
        $request->validate([
            'author' => 'required',
            'needed_sum' => 'required',
            'description' => 'required',
        ]);
        Project::create($request->all());
        return(json_encode('created'));
    }

    public function update(Request $request, $id) {
        $project = Project::find($id);
        if(($this->user['role'] == 'admin' || $this->user['email'] == $project['author']) && isset($this->token)) {
            $project->update($request->all());
            return(json_encode('updated'));
        } else {
            return(json_encode('Not permitted'));
        }
    }

    public function donate(Request $request, $id) {
        $project = Project::find($id);
        $request->merge([
            'current_sum' => $request->current_sum + $project->current_sum,
        ]);
        $project->update($request->all());
    }

    public function delete($id) {
        $project = Project::find($id);
        if(($this->user['role'] == 'admin' || $this->user['email'] == $project['author']) && isset($this->token)) {
            Project::destroy($id);
            return(json_encode('deleted'));
        } else {
            return (json_encode('Not permitted'));
        }
    }
}
