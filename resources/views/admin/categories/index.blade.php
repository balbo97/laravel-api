@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div>

                        <h2>Le mie Categorie</h2>
                    </div>
                    <div>

                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"> Add</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>SLUG</th>
                            <th>COUNT PROJECTS</th>
                            <th>STRUMENTI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>

                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->slug }}
                                </td>
                                <td>
                                    {{ count($category->projects) }}
                                </td>

                                <td>
                                    <button-container class="d-flex">

                                        <a class="btn btn-warning  m-2"
                                            href="{{ route('admin.categories.edit', ['category' => $category['id']]) }}"> <i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=" m-2"
                                            action="{{ route('admin.categories.destroy', ['category' => $category['id']]) }}"
                                            method="POST"
                                            onsubmit="return confirm('sei sicuro di voler eliminare la categoria?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>

                                        <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}"
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
