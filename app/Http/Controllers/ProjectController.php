<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()
            ->where('uid', Auth::id())
            ->orderBy("created_at", "desc")
            ->paginate(10);
        return view('project.index', ['projects' => $projects]);
    }
    public function all()
    {
        $projects = Project::query()->orderBy("created_at", "desc")->paginate(10);
        return view('project.all', ['projects' => $projects]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'string',
            'view' => 'in:project.index,project.all']);

        $query = $request->input('query');
        $view = $request->input('view');
        $projects = Project::query()
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('start_date', 'LIKE', "%{$query}%")
            ->orderBy("created_at", "desc")
            ->paginate(10);

        return view($view, ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'phase' => ['required'],
            'description' => ['required', 'string'],
        ]);
        $data['uid'] = $request->user()->uid;
        $project = Project::create($data);
        return redirect()->route('project.show', $project->pid)->with('message', 'Project was added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $project]);
    }
    public function show_notlogged(Project $project)
    {
        return view('project.show_notlogged', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'phase' => ['required'],
            'description' => ['required', 'string'],
        ]);

        $project->update($data);
        return redirect()->route('project.show', $project->pid)->with('message', 'Project was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('message', 'Project was deleted');
    }
}
