@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>

                        <h2>I miei Progetti</h2>
                    </div>
                    <div>

                        <a href="{{ route('admin.project.create') }}" class="btn btn-primary"> Add</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITOLO</th>
                            <th>AUTORE</th>
                            <th>CONTENUTO</th>
                            <th>SLUG</th>
                            <th>COVER IMAGE</th>
                            <th>TOOLS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>

                                <td>
                                    {{ $project->id }}
                                </td>
                                <td>
                                    {{ $project->title }}
                                </td>
                                <td>
                                    {{ $project->autore }}
                                </td>
                                <td>
                                    {{ $project->content }}
                                </td>
                                <td>
                                    {{ $project->slug }}
                                </td>
                                <td>
                                    {{ $project->cover_image }}
                                </td>
                                <td>
                                    <button-container class="d-flex">

                                        <a class="btn btn-warning  m-2"
                                            href="{{ route('admin.project.edit', ['project' => $project['id']]) }}"> <i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=" m-2"
                                            action="{{ route('admin.project.destroy', ['project' => $project['id']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('sei sicuro di voler eliminare il fumetto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('admin.project.show', ['project' => $project->id]) }}"
                                            class="btn btn-primary m-2"><i class="fas fa-eye"></i></a>
                                    </button-container>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
