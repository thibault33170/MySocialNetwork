@extends('layouts.app')

<style type="text/css">
    .profile-img {
        max-width: 150px;
        border: 4px solid #fff;
        border-radius: 100%;
        box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }
</style>

@section('content')
    @forelse($results as $result)
    <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <img class="profile-img" src="/uploads/avatars/{{ $result->avatar }}">
                        <h1>{{ $result->name }}</h1>
                        <h5> {{ $result->email }} </h5>
                        <h5> {{ $result->dob->format('l j F Y') }} ({{ $result->dob->age }} years old) </h5>
                        <follow :target="{{ $result->id }}"></follow>
                    </div>
                </div>
            </div>
        </div>
    @empty
        empty
    @endforelse
@endsection