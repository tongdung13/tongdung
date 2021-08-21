@extends('layouts.app')

@section('title', 'Thêm tên truyện')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">THÊM TÊN TRUYỆN</h3>
        <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên truyện</label>
                        <span style="color: red">*</span>
                        <input type="text" name="story_name" class="form-control" value="{{ old('story_name') }}" id="">
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('story_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="category_id[]" class="form-control select2" multiple id="">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tác giả</label>
                        <span style="color: red">*</span>
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}" id="">
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('author') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <span style="color: red">*</span>
                        <input type="file" name="image" class="form-control-file" value="{{ old('image') }}" accept="image/*">
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="" style="margin-left: 15px" onclick="window.history.go(-1); return false"
                    class="btn btn-sm btn-outline-success">Trở về</a>
                <button type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 10px"
                    onclick="return confirm('Bạn có muốn thêm truyện này không?')">Thêm</button>
            </div>
        </form>
    </div>

@endsection


