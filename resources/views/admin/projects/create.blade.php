@extends('layouts.admin')


@section('content')
    {{-- FORM PER AGGIUNGER UN COMIC --}}
    <div class="container-sm py-5">
        <div class="form-container">

            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">ADD NEW PROJECT</h2>
                </div>
                <div class="col-12">
                    <form action="{{ route('admin.project.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <ul class="list-unstyled">
                                        <li>
                                            {{ $error }}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group my-3">
                            <label class="d-block" for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Project Name" required>
                        </div>
                        <div class="form-group my-3">
                            <label class="d-block" for="autore">Autore</label>
                            <input type="text" id="autore" name="autore" placeholder="Autore" required>
                        </div>
                        <div class="form-group my-3">
                            <label class="d-block" for="thumb">Link Image</label>
                            <input type="text" id="cover_image" name="cover_image" placeholder="Project Url">
                        </div>
                        <div class="form-group my-3">

                            <label class="d-block" for="content">Content</label>
                            <textarea name="content" id="content" cols="100" rows="10" placeholder="decription"></textarea>
                        </div>
                        <div class="form-group my-3">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
