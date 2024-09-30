<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('technology', 'type')->get();

        return response()->json($projects);
    }

    public function technologies(){

        $technologies = Technology::all();

        return response()->json($technologies);

    }

    public function types(){

        $types = Type::all();

        return response()->json($types);

    }
}
