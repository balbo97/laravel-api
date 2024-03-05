@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->autore }}</p>
                <p>{{ $project->content }}</p>
                <p>{{ $project->slug }}</p>
                <p>{{ $project->category ? $project->category->name : 'Nessuna Categoria' }}</p>
                <p>
                    @forelse ($project->tecnologies as $tecnology)
                        #{{ $tecnology->name }}
                    @empty
                        #Questo progetto non ha nessuna tecnologia assegnata
                    @endforelse
                </p>
                <p>{{ $project->inizio_progetto }}</p>
                <p>{{ $project->fine_progetto }}</p>
                @if ($project->cover_image !== null)
                    <img src="{{ asset('/storage/' . $project->cover_image) }}" alt="{{ $project->title }}" width="200">
                @else
                    <img src="{{ asset('/img/placeholder.jpg') }}" alt="{{ $project->title }}" width="200">
                @endif
            </div>
        </div>
    </div>
@endsection
