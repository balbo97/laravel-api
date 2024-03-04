@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $category->name }}</h2>
                <p>{{ $category->slug }}</p>
                <div class="row">

                    @forelse($category->projects as $project)
                        <div class="col-12">
                            <div class="card">
                                <img src="{{ $project->cover_image ? asset('/storage/' . $project->cover_image) : asset('/img/placeholder.jpg') }}"
                                    alt="{{ $project->title }}" width="200">
                                <div class="card-body">
                                    {{ $project->title }}
                                </div>

                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            <p>Questa categoria non ha nessun progetto.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection
