@extends('layouts.app')

@section('title', 'Sửa chương')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">SỬA CHƯƠNG</h3>
        <form action="{{ route('chapters.update', $chapters->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên truyện</label>
                        <span style="color: red">*</span>
                        <select name="story_id" class="form-control" id="">
                            <option value="">Truyện</option>
                            @foreach ($stories as $item)
                                <option value="{{ $item->id }}">{{ $item->story_name }}</option>
                            @endforeach
                            @if ($errors->any())
                                <p style="color: red">{{ $errors->first('story_id') }}</p>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên chương</label>
                        <span style="color: red">*</span>
                        <input type="text" name="chapter" class="form-control" value="{{ $chapters->chapter }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <span style="color: red">*</span>
                        <textarea class="ckeditor form-control" name="content">{{ $chapters->content }}</textarea>
                        @if ($errors->any())
                            <p style="color: red"> {{ $errors->first('content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="" style="margin-left: 15px" onclick="window.history.go(-1); return false"
                    class="btn btn-sm btn-outline-success">Trở về</a>
                <button type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 10px"
                    onclick="return confirm('Bạn có muốn sửa chương này không?')">Sửa</button>
            </div>
        </form>
    </div>

@endsection
