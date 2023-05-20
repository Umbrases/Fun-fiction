@extends('layouts.main')
@section('content')
    <div>


        <form action="{{ route('fan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название книги</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Название книги">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Описание</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Описание">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Изображение</label>
                <input class="form-control" name="image" type="file" id="image">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Теги</label>
                @foreach($tags as $tag)
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="tags[]" type="checkbox" role="switch" id="tags" value="{{ $tag->id }}">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $tag->title }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Категории</label>
                @foreach($categories as $category)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"  name="categories[]"  role="switch" id="categories" value="{{ $category->id }}">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $category->title }}</label>
                    </div>
                @endforeach
            </div>

{{--            <div class="mb-3">--}}
{{--                <label for="exampleFormControlInput1" class="form-label">Текст</label>--}}
{{--                <textarea class="form-control"  name="chapters" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
