@extends('layouts.app')

@section('title', 'Thêm danh mục')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">THÊM DANH MỤC</h3>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <span style="color: red">*</span>
                <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}">
                @if ($errors->any())
                    <p style="color: red">{{ $errors->first('category_name') }}</p>
                @endif
            </div>
            <div class="row">
                <a href="" style="margin-left: 15px" onclick="window.history.go(-1); return false"
                    class="btn btn-sm btn-outline-success">Trở về</a>
                <button type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 10px"
                    onclick="return confirm('Bạn có muốn thêm danh mục này không?')">Thêm</button>
            </div>
        </form>
    </div>

@endsection
