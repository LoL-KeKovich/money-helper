<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
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

    public function store(Request $request) {
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
