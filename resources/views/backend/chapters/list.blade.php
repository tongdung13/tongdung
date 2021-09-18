@extends('layouts.app')

@section('title', 'Danh sách chương')

@section('content')

    <div class="container">
        <h3 style="color: chocolate">DANH SÁCH CHƯƠNG</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên truyện</th>
                    <th>Tên chương</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chapters as $key => $chapter)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $chapter->story->story_name }}</td>
                        <td>
                            <a href="{{ route('chapters.show', $chapter->id) }}">{{ $chapter->chapter }}</a>
                        </td>
                        <td>
                            <a href="{{ route('chapters.edit', $chapter->id) }}"
                                class="btn btn-sm btn-outline-warning">Sửa</a>
                            <a href="{{ route('chapters.destroy', $chapter->id) }}" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Bạn có muốn xóa chương truyện này?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $chapters->onEachSide(5)->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection
