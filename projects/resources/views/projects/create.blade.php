@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Project') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="naziv_projekta">{{ __('Project Name') }}</label>
                            <input id="naziv_projekta" type="text" class="form-control @error('naziv_projekta') is-invalid @enderror" name="naziv_projekta" value="{{ old('naziv_projekta') }}" required autofocus>
                            @error('naziv_projekta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="opis_projekta">{{ __('Description') }}</label>
                            <input id="opis_projekta" type="text" class="form-control @error('opis_projekta') is-invalid @enderror" name="opis_projekta" value="{{ old('opis_projekta') }}" required autofocus>
                            @error('opis_projekta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="cijena_projekta">{{ __('Price') }}</label>
                            <input id="cijena_projekta" type="number" class="form-control @error('cijena_projekta') is-invalid @enderror" name="cijena_projekta" value="{{ old('cijena_projekta') }}" required autofocus>
                            @error('cijena_projekta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="datum_pocetka">{{ __('Start Date') }}</label>
                            <input id="datum_pocetka" type="date" class="form-control @error('datum_pocetka') is-invalid @enderror" name="datum_pocetka" value="{{ old('datum_pocetka') }}" required autofocus>
                            @error('datum_pocetka')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="datum_zavrsetka">{{ __('End Date') }}</label>
                            <input id="datum_zavrsetka" type="date" class="form-control @error('datum_zavrsetka') is-invalid @enderror" name="datum_zavrsetka" value="{{ old('datum_zavrsetka') }}" required autofocus>
                            @error('datum_zavrsetka')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create Project') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
