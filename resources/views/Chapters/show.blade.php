@extends('layouts.main')
@section('content')
    <div>
        <a href="">Обновить</a>
        <form action="" method="post" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><h1>{{ $work->title }}</h1></label>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ Storage::disk('public')->get('/fileText/'.$work->fanFiction_id.'.'.$work->title) }}</label>
            </div>



        </form>
    </div>
@endsection
