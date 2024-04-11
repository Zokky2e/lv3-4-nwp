@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($project) ? 'Edit Project' : 'Create Project' }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}">
                        @csrf
                        @if(isset($project))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="naziv_projekta">Project Name</label>
                            <input type="text" class="form-control" id="naziv_projekta" name="naziv_projekta" value="{{ isset($project) ? $project->naziv_projekta : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="opis_projekta">Project Description</label>
                            <textarea class="form-control" id="opis_projekta" name="opis_projekta">{{ isset($project) ? $project->opis_projekta : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cijena_projekta">Project Price</label>
                            <input type="number" class="form-control" id="cijena_projekta" name="cijena_projekta" value="{{ isset($project) ? $project->cijena_projekta : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="datum_pocetka">Start Date</label>
                            <input type="date" class="form-control" id="datum_pocetka" name="datum_pocetka" value="{{ isset($project) ? $project->datum_pocetka : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="datum_zavrsetka">End Date</label>
                            <input type="date" class="form-control" id="datum_zavrsetka" name="datum_zavrsetka" value="{{ isset($project) ? $project->datum_zavrsetka : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="users">Select Users</label>
                            <select class="form-control" id="users" name="users[]" multiple>
                                @foreach($availableUsers as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($project) ? 'Update Project' : 'Create Project' }}</button>
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Back to Profile</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
