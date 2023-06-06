@extends('layouts.main')
@section('content')


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
