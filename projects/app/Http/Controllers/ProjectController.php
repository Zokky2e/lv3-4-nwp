<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        return view('projects.create');
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
}
