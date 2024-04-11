<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class ProjectController extends Controller
{

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function create(Project $project = null)
    {
        $availableUsers = [];
        if ($project) {
            $availableUsers = User::whereNotIn('id', [$project->leader_id])
                ->whereDoesntHave('projects', function ($query) use ($project) {
                    $query->where('project_id', $project->id);
                })
                ->get();
        }

        return view('projects.create', compact('project', 'availableUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv_projekta' => 'required|string',
            'opis_projekta' => 'required|string',
            'cijena_projekta' => 'required|numeric',
            'datum_pocetka' => 'required|date',
            'datum_zavrsetka' => 'nullable|date',
        ]);

        $user = Auth::user();

        $project = new Project();
        $project->naziv_projekta = $request->input('naziv_projekta');
        $project->opis_projekta = $request->input('opis_projekta');
        $project->leader_id = $user->id;
        $project->cijena_projekta = $request->input('cijena_projekta');
        $project->datum_pocetka = $request->input('datum_pocetka');
        $project->datum_zavrsetka = $request->input('datum_zavrsetka');
        $project->save();

        return redirect()->route('profile.show')->with('success', 'Project created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv_projekta' => 'required|string',
            'opis_projekta' => 'required|string',
            'cijena_projekta' => 'required|numeric',
            'datum_pocetka' => 'required|date',
            'datum_zavrsetka' => 'nullable|date',
        ]);

        $project = Project::findOrFail($id);

        // Check if the logged-in user is the leader of the project
        if ($project->leader_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to update this project.');
        }

        $project->naziv_projekta = $request->input('naziv_projekta');
        $project->opis_projekta = $request->input('opis_projekta');
        $project->cijena_projekta = $request->input('cijena_projekta');
        $project->datum_pocetka = $request->input('datum_pocetka');
        $project->datum_zavrsetka = $request->input('datum_zavrsetka');
        $project->save();

        // Sync the selected users with the project
        $project->teamMembers()->sync($request->input('users'));

        return redirect()->route('profile.show')->with('success', 'Project updated successfully.');
    }



}
