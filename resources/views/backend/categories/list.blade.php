@extends('layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')

    <div class="container">
        <div class="container row">
            <div class="col-6">
                <h3 style="color: chocolate">DANH MỤC</h3>
            </div>
            <div class="col-6">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary"
                    style="margin-left: 100%">Thêm</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="btn btn-sm btn-outline-warning">Sửa</a>
                            <a href="{{ route('categories.destroy', $category->id) }}"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Bạn có muốn xóa danh mục này?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $categories->onEachSide(5)->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection
