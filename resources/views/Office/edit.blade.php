@extends('layouts.main')
@section('content')

    <form action="{{ route('office.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="col-md-6 mb-3">
            <input class="form-control" name="name" type="text" id="name" value="{{ auth()->user()->name }}">
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-control" name="email" type="text" id="email" value="{{ auth()->user()->email }}">
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-control" name="image" type="file" id="image" value="{{ auth()->user()->image }}">
        </div>


        <button type="submit" class="btn btn-primary">Изменить</button>

    </form>
    <div>
        <a href="{{ route('office.password.edit', auth()->user()->id) }}">Сменить пароль</a>
    </div>
@endsection
