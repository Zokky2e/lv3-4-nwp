<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    public function getAvailableUsers($projectId)
    {
        $project = Project::findOrFail($projectId);
        $leaderId = $project->leader_id;
        $assignedUserIds = $project->users->pluck('id')->toArray();
        $availableUsers = User::whereNotIn('id', array_merge([$leaderId], $assignedUserIds))->get();

        return $availableUsers;
    }
}
