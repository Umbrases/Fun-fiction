@extends('layouts.main')
@section('content')

    <form action="{{ route('office.password.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="col-md-6 mb-3">
            <input class="form-control" name="oldPassword" type="password" id="oldPassword" placeholder="Старый пароль">
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-control" name="password" type="password" id="password" placeholder="Новый пароль">
        </div>


        <button type="submit" class="btn btn-primary">Изменить</button>

    </form>
    <div>
        <a href="{{ route('office.password.edit', auth()->user()->id) }}">Сменить пароль</a>
    </div>
@endsection
