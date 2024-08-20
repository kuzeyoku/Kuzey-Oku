<?php

namespace App\Http\Controllers;

use App\Enums\ModuleEnum;
use App\Models\Category;
use App\Models\Project;
use App\Services\SeoService;

class ProjectController extends Controller
{
    public function index()
    {
        SeoService::set();
        $projects = Project::active()->order()->get();
        $categories = Category::whereModule(ModuleEnum::Project->value)->active()->order()->get();
        return view('project.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        SeoService::set($project);
        $otherProjects = Project::whereKeyNot($project->id)->get();
        return view('project.show', compact('project', "otherProjects"));
    }
}
