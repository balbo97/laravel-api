@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->autore }}</p>
                <p>{{ $project->content }}</p>
                <p>{{ $project->slug }}</p>
                <p>{{ $project->inizio_progetto }}</p>
                <p>{{ $project->fine_progetto }}</p>
                <p>{{ $project->cover_image }}</p>
            </div>
        </div>
    </div>
@endsection
