<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $ownedProjects = Project::where('leader_id', $user->id)->get();
        $teamProjects = $user->projects()->where('leader_id', '!=', $user->id)->get();
        //dd($ownedProjects);
        return view('profile.show', compact('ownedProjects', 'teamProjects'));
    }
}
