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

                        <a href="" class="btn btn-primary"> Add</a>
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
                                    <a href="{{ route('admin.project.show', ['project' => $project->id]) }}"
                                        class="btn btn-sm btn-primary btn-square"><i class="fas fa-eye"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
