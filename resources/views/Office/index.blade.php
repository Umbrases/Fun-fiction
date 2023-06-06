@extends('layouts.main')
@section('content')

    <div>
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{ asset('/storage/' . auth()->user()->image) }}" class="img-fluid img-thumbnail" alt="..."
                     style="height: 10rem">
            </div>
        </form>
        <p class="card-text">Логин: {{ auth()->user()->name }}</p>
        <p class="card-text">Email: {{ auth()->user()->email }}</p>
        @can('view', auth()->user())
            <p class="card-text">Книги:
                @foreach($fanfictions as $fanfiction)
                    @if(auth()->user()->id === $fanfiction->user_id)
                        <a href="{{ route('fan.show', $fanfiction->id) }}">{{$fanfiction->title}}</a>,
                    @endif
                @endforeach
            </p>
        @endcan
        <p class="card-text">Лайки:
            @foreach($fanfictions as $fanfiction)
                @if(auth()->user()->likedFanfiction->contains($fanfiction->id))
                    <a href="{{ route('fan.show', $fanfiction->id) }}">{{ $fanfiction->title }}</a>,
                @endif
            @endforeach
        </p>

        <p class="card-text">Коментарии: </p>
        <div class="card card-widget">

            @foreach($fanfictions as $fanfiction)

                @foreach($fanfiction->comments as $fancomments)
                    @if(auth()->user()->id === $fancomments->user_id)
                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                    <span class="username">
                      {{$fancomments->user->name}}
                      <span class="text-muted float-right">{{$fancomments->created_at}}</span>

                        <span>В книге <a
                                href="{{ route('fan.show', $fanfiction->id) }}">{{ $fanfiction->title }}</a></span>
                    </span>
                                    {{ $fancomments->message }}
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>


        @can('viewUser', auth()->user())
        <div>
            <form action="{{ route('office.update.author', auth()->user()->id) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-dark mb-3">Стать автором</button>
            </form>
        </div>
        @endcan

        <div>
            <a href="{{ route('office.edit', auth()->user()->id) }}">Изменить</a>
        </div>
    </div>

@endsection
