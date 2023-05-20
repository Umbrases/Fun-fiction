@extends('layouts.main')
@section('content')
    <div>

        <form action="{{ route('chapters.update', $chapters->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" id="fanFiction_id" name="fanFiction_id" value="{{ $chapters->fanFiction_id }}">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название главы</label>

                <input type="text" name="title" class="form-control" id="title" placeholder="Название главы"
                       value="{{ $chapters->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Текст</label>
                <textarea class="form-control" placeholder="Текст" id="text" name="text"
                          style="height: 100px">{{ Storage::disk('public')->get('/fileText/'.$chapters->fanFiction_id.'.'.$chapters->title) }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection



