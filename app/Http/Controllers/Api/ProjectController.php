<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        // requpero tutti i progetti raggruppati per categoria e tecnologie e l'impagino a gruppi di 8.
        $projects = Project::with('category', 'tecnologies')->paginate(8);

        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }
}
