@extends('layouts.main')
@section('content')

    <div>id:{{ $fanfiction->id }}</div>
    <div>Название:{{ $fanfiction->title }}</div>
    <div>Описание:{{ $fanfiction->description }}</div>
    <div class="form-group w-50">
        <img src="{{ asset('/storage/' . $fanfiction->image) }}" class="img-thumbnail w-50" alt="...">
    </div>
    <div>Категории:
        @foreach($fanfiction->categories as $fancategory)
            {{ $fancategory->title }},
        @endforeach
    </div>
    <div>Теги:
        @foreach($fanfiction->tags as $fantag)
            {{ $fantag->title }},
        @endforeach
    </div>




    @can('update', $fanfiction)
        <a href="{{ route('fan.edit', $fanfiction->id) }}" class="btn btn-dark mb-3">Изменить</a>
    @endcan


    @can('delete', $fanfiction)
        <form action="{{ route('fan.destroy', $fanfiction->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger mb-3">
        </form>
    @endcan
    <div>
        <form action="{{ route('fanfiction.like.store', $fanfiction->id) }}" method="post">
            @csrf

            @auth()
                <button type="submit" class="border-0 bg-transparent">
                    @if(auth()->user()->likedFanfiction->contains($fanfiction->id))
                        <i class="bi bi-suit-heart-fill" style="color: red;"></i>{{$fanfiction->likesCount()}}
                    @else
                        <i class="bi bi-heart"></i>{{$fanfiction->likesCount()}}
                    @endif
                </button>
            @else
                <i class="bi bi-heart"></i>{{$fanfiction->likesCount()}}
            @endauth

        </form>


    </div>




    <div class="container">


        @can('create', $fanfiction)
            <div>
                <a href="{{ route('chapters.create', $fanfiction->id) }}" class="btn btn-dark mb-3">Добавить</a>
            </div>
        @endcan

        <label for="">Оглавление</label>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                @can('update', $fanfiction)
                    <th scope="col">Изменение</th>
                @endcan
                @can('delete', $fanfiction)
                    <th scope="col">Удаление</th>
                @endcan
            </tr>
            </thead>
            @foreach($fanfiction->chapters as $fanchapter)
                <tbody>
                <tr>
                    <th scope="row"><a href="{{ route('chapters.show', $fanchapter->id) }}"
                                       class="btn">{{ $fanchapter->id }}
                            .{{ $fanchapter->title }}</a></th>

                    @can('update', $fanfiction)
                        <td>
                            <a href="{{ route('chapters.edit', $fanchapter->id) }}"
                               class="btn btn-dark mb-3">Изменить</a>
                        </td>
                    @endcan
                    @can('delete', $fanfiction)
                        <td>
                            <form action="{{ route('chapters.destroy', $fanchapter->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger mb-3">
                            </form>
                        </td>
                @endcan
                </tbody>
                </tr>
            @endforeach
        </table>
    </div>



    <div>


        <div>
            <div class="card card-widget">
            @foreach($fanfiction->comments as $fancomments)

                <div class="card-footer card-comments">
                    <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                    <span class="username">
                      {{$fancomments->user->name}}
                      <span class="text-muted float-right">{{$fancomments->created_at}}</span>
                    </span><!-- /.username -->
                            {{ $fancomments->message }}
                        </div>
                        <!-- /.comment-text -->
                    </div>

                </div>

            @endforeach


                <div class="card-footer">

                    <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <form action="{{ route('fanfiction.comment.store', $fanfiction->id) }}" method="post">
                        @csrf
                        <div class="img-push">
                            <input type="text" class="form-control form-control-sm" id="message" name="message"
                                   placeholder="Press enter to post comment">
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="bi bi-caret-right"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
