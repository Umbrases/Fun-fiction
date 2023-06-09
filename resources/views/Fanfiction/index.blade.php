@extends('layouts.main')
@section('content')

    <form action="{{ route('fan.index') }}" method="get">

        <select name="categories" id="categories" class="form-select mb-3 w-25" aria-label="Default select example"
                style="display: inline-block">
            @foreach($categories as $category)
                <option
                        @if($_GET and $_GET['categories'] == $category->title)
                            {{ 'selected' }}
                        @endif
                    value="{{$category->title}}">{{$category->title}}</option>
            @endforeach
        </select>

        <select name="tags" id="tags" class="form-select mb-3 w-25" aria-label="Default select example"
                style="display: inline-block">
            @foreach($tags as $tag)
                <option
                        @if($_GET and $_GET['tags'] == $tag->title)
                            {{ 'selected' }}
                        @endif
                    value="{{$tag->title}}">{{$tag->title}}</option>
            @endforeach
        </select>

        <input type="submit" value="Send">
    </form>

    @can('view', auth()->user())
        <div>
            <a href="{{ route('fan.create') }}" class="btn btn-success mb-3">Add one</a>
        </div>
    @endcan






    {{--    <div class="container-fluid">--}}
    @foreach($fanfictions as $fanfiction)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/' . $fanfiction->image) }}" class="img-fluid rounded-start" alt="..."
                         style="height: -webkit-fill-available;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fanfiction->title }}</h5>
                        <p class="card-text">{{ $fanfiction->description }}</p>
                        <p class="card-text">
                            @foreach($fanfiction->categories as $fancategory)
                                {{ $fancategory->title }},
                            @endforeach
                        </p>

                        <p class="card-text">
                            @foreach($fanfiction->tags as $fantag)
                                {{ $fantag->title }},
                            @endforeach
                        </p>
                        <a href="{{ route('fan.show', $fanfiction->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    {{--    </div>--}}
@endsection
