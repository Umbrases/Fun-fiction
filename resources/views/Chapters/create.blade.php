@extends('layouts.main')
@section('content')
    <div>

        <form action="{{ route('chapters.store', $fanfiction->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" id="fanFiction_id" name="fanFiction_id" value="{{$fanfiction->id}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название главы</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Название главы">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Текст</label>
                <textarea class="form-control" placeholder="Текст" id="text" name="text" style="height: 100px"></textarea>
            </div>






            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
