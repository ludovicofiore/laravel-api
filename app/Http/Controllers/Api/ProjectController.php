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

    public function projectByslug($slug) {

        $project = Project::where('slug', $slug)->with('technology', 'Type')->first();

        if($project){
            $success = true;

            if($project->cover_img) {
                $project->cover_img = asset('storage/' . $project->cover_img);
            }else {
                $project->cover_img = '/img/no-image.jpg';
            }

        }else {
            $success = false;
        }

        return response()->json(compact('project', 'success'));
    }


    public function projectsByType($slug) {
        $type = Type::where('slug', $slug)->with('projects')->first();

        if($type){
            $success = true;
        }else {
            $success = false;
        }

        return response()->json(compact('success', 'type'));
    }

    public function projectsByTechnology($slug) {
        $technology = Technology::where('slug', $slug)->with('project')->first();

        if($technology){
            $success = true;
        }else {
            $success = false;
        }

        return response()->json(compact('success', 'technology'));
    }
}
