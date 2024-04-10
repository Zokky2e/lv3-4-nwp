
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="card-header" href="{{ route('projects.create') }}">Add Project</a>
                <div class="card-body">
                    <h4>Tvoji Projekti</h4>
                    @if (count($ownedProjects)<=0)
                        <p>Nisi kreirao ni jedan projekt.</p>
                    @else
                        <ul class="card-item">
                            @foreach($ownedProjects as $project)
                                <li>{{ $project->naziv_projekta }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-body">
                    <h4>Projekti na kojima sudjelujes</h4>
                    @if (count($teamProjects)<=0)
                        <p>Ne sudjelujes ni na jednom projektu.</p>
                    @else
                        <ul>
                            @foreach($teamProjects as $project)
                                <li>{{ $project->naziv_projekta }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
