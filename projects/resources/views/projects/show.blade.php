@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
					<div>
						{{ $project->naziv_projekta }}
					</div>
					<div>
						@if(Auth::id() == $project->leader_id)
							<a href="{{ route('projects.create', $project) }}" class="btn btn-primary">Edit</a>
						@endif
						{{date('m.d.Y.', strtotime($project->created_at));}}
					</div>
				</div>

                <div class="card-body">
                    <p><strong>Description:</strong> {{ $project->opis_projekta }}</p>
                    <p><strong>Done Jobs:</strong> {{ $project->obavljeni_poslovi }}</p>
                    <p><strong>Leader:</strong> {{ $project->projectLeader->name}}</p>
                    <p><strong>Price:</strong> {{ $project->cijena_projekta }}</p>
                    <p><strong>Start Date:</strong> {{ date('m.d.Y.', strtotime($project->datum_pocetka)); }} </p>
                    <p><strong>End Date:</strong> {{ date('m.d.Y.', strtotime($project->datum_zavrsetka)); }}</p>
					<p><strong>Team Members:</strong></p>
					<ul>
						@foreach($project->teamMembers as $member)
							<li>{{ $member->name }}</li>
						@endforeach
					</ul>
				</div>
				<div class="card-footer">
                    <a href="{{ route('profile.show') }}" class="btn btn-primary">Back to Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection