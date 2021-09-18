@extends('layouts.app')

@section('title', 'Sửa tên truyện')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">SỬA TÊN TRUYỆN</h3>
        <form action="{{ route('stories.update', $stories->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên truyện</label>
                        <span style="color: red">*</span>
                        <input type="text" name="story_name" class="form-control" value="{{ $stories->story_name }}"
                            id="">
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
                    <div class="form-group">
                        <label for="">Tác giả</label>
                        <span style="color: red">*</span>
                        <input type="text" name="author" class="form-control" value="{{ $stories->author }}" id="">
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('author') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <span style="color: red">*</span>
                        <select name="status" class="form-control">
                            <option value="{{ $stories->status }}">{{ $stories->status }}</option>
                            <option value="Hoàn thành">Hoàn thành</option>
                            <option value="Chưa hoàn thành">Chưa hoàn thành</option>
                            <option value="Truyện mới">Truyện mới</option>
                        </select>
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('status') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <span style="color: red">*</span>
                        <input type="file" name="image" class="form-control-file" value="{{ old('image') }}"
                            accept="image/*">
                        @if ($errors->any())
                            <p style="color: red">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Mô tả</label>
                        <span style="color: red">*</span>
                        <textarea class="ckeditor form-control" name="publish" >{{ $stories->publish }}</textarea>
                        @if ($errors->any())
                            <p style="color: red"> {{ $errors->first('publish') }}</p>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <a href="" style="margin-left: 15px" onclick="window.history.go(-1); return false"
                    class="btn btn-sm btn-outline-success">Trở về</a>
                <button type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 10px"
                    onclick="return confirm('Bạn có muốn sửa truyện này không?')">Sửa</button>
            </div>
        </form>
    </div>

@endsection
