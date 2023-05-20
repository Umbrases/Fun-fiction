@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('fan.update', $fanfiction->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название книги</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Название книги"
                       value="{{ $fanfiction->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Описание</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Описание"
                       value="{{ $fanfiction->description }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Изображение</label>
                <div class="form-group w-50">
                    <img src="{{ asset('storage/' . $fanfiction->image) }}" class="img-thumbnail w-50" alt="...">
                </div>
                <input class="form-control" name="image" type="file" id="image" value="{{ $fanfiction->image }}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Теги</label>
                @foreach($tags as $tag)
                    <div class="form-check form-switch">
                        <input
                            @foreach($fanfiction->tags as $fantag)
                                {{ $tag->id === $fantag->id ? 'checked' : ''}}
                            @endforeach
                            class="form-check-input" name="tags[]" type="checkbox" role="switch" id="tags"
                            value="{{ $tag->id }}">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $tag->title }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Категории</label>
                @foreach($categories as $category)
                    <div class="form-check form-switch">
                        <input
                            @foreach($fanfiction->categories as $fancategory)
                                {{ $category->id === $fancategory->id ? 'checked' : ''}}
                            @endforeach
                            class="form-check-input" type="checkbox" name="categories[]" role="switch"
                            id="categories" value="{{ $category->id }}">
                        <label class="form-check-label" for="flexSwitchCheckChecked">{{ $category->title }}</label>
                    </div>
                @endforeach
            </div>

            {{--            <div class="mb-3">--}}
            {{--                <label for="exampleFormControlInput1" class="form-label">Текст</label>--}}
            {{--                <textarea class="form-control"  name="chapters" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
            {{--            </div>--}}
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
