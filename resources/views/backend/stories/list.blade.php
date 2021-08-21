@extends('layouts.app')

@section('title', 'Danh sách tên truyện')

@section('content')

    <div class="container">
        <div class="container row">
            <div class="col-6">
                <h3 style="color: chocolate">TRUYỆN</h3>
            </div>
            <div class="col-6">
                <a href="{{ route('stories.create') }}" class="btn btn-sm btn-outline-primary"
                    style="margin-left: 100%">Thêm</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên truyện</th>
                    <th>Tác giả</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $key => $story)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $story->story_name }}</td>
                        <td>{{ $story->author }}</td>
                        <td>
                            @php
                                $arr_cate = [];
                                $story_id = $story->id;
                                $stori = \App\Models\Category::whereHas('stories', function (\Illuminate\Database\Eloquent\Builder $q) use ($story_id) {
                                    $q->where('stories.id', '=', $story_id);
                                })
                                    ->take(2)
                                    ->get();
                                foreach ($stori as $item) {
                                    // $arr_cate[] = '<a href="' . route('author.detail', $item->id) . '">' . $item->name . '</a>';
                                    $arr_cate[] = $item->category_name;
                                }
                                echo implode(',<br/>', $arr_cate) . ' ...';
                            @endphp
                        </td>
                        <td>
                            <img src="{{ $story->image }}" style="width: 150px" alt="">
                        </td>
                        <td>
                            <a href="{{ route('stories.edit', $story->id) }}"
                                class="btn btn-sm btn-outline-warning">Sửa</a>
                            <a href="{{ route('stories.destroy', $story->id) }}" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Bạn có muốn xóa truyện này?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $stories->onEachSide(5)->links('pagination::bootstrap-4') }}
        </div>
    </div>


@endsection
