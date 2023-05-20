@extends('layouts.main')
@section('content')

    <div>
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
                    <div class="card-footer card-comments">
                        <div class="card-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                    <span class="username">
                      {{$fancomments->user->name}}
                      <span class="text-muted float-right">{{$fancomments->created_at}}</span>

                        <span>В книге <a href="{{ route('fan.show', $fanfiction->id) }}">{{ $fanfiction->title }}</a></span>
                    </span>
                                {{ $fancomments->message }}
                            </div>
                        </div>

                    </div>

                @endforeach
            @endforeach
        </div>

    </div>

@endsection
