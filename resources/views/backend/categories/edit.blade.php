@extends('layouts.app')

@section('title', 'Sửa danh mục')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">SỬA DANH MỤC</h3>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <span style="color: red">*</span>
                <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                @if ($errors->any())
                    <p style="color: red">{{ $errors->first('category_name') }}</p>
                @endif
            </div>
            <div class="row">
                <a href="" style="margin-left: 15px" onclick="window.history.go(-1); return false"
                    class="btn btn-sm btn-outline-success">Trở về</a>
                <button type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 10px"
                    onclick="return confirm('Bạn có muốn sửa danh mục này không?')">Sửa</button>
            </div>
        </form>
    </div>

@endsection
