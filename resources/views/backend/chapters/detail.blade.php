@extends('layouts.app')

@section('title', 'Chi tiết chương')

@section('content')

    <div class="container">
        <div class="row">
            <h3 style="color: aquamarine; margin-left: 43%">{{ $chapters->story->story_name }}</h3>
        </div>
        <div class="row">
            <h4 style="margin-left: 37%">{{ $chapters->chapter }}</h4>
        </div>
        <div class="row">
            <h4 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">{!! $chapters->content !!}</h4>
        </div>
    </div>


@endsection
