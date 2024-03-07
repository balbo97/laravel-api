@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">

            <div class="col-12">
                <div class="my-3">

                    <form class="my-form" action="{{ route('admin.categories.update', ['category' => $category->slug]) }}"
                        method="post">
                        @method('PUT')
                        @csrf

                        <div class="container">
                            <div class="row">

                                <div class="col-12 my-3 ">
                                    <label for="name">Nome Categoria:</label>
                                    <input required max="255" class="w-25" type="text" name="name"
                                        id="name" placeholder="Name" value="{{ $category->name }}">
                                    @error('name')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                    @if (!empty($error_message))
                                        <div class="my-error-msg">WARNING: {{ $error_message }}</div>
                                    @endif
                                </div>

                                <div class="col-12 my-3">
                                    <button class="my-red-btn" type="submit">Modifica</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
