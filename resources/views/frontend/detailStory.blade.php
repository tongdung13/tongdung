@extends('layouts.frontend')

@section('title', $stories->story_name)
<link rel="icon" href="{{ asset($stories->image) }}" type="image/png">

@section('content')

    <div class="container">
        <div class="row">
            <div class="clol-4">
                <img src="{{ asset($stories->image) }}" style="width: 350px; height: 450px" alt="">
            </div>
            <div class="col-5">
                <h3 style="margin-left: 30%">{{ $stories->story_name }}</h3>
                <hr>
                Tác giả: <b>{{ $stories->author }}</b><br>
                Thể loại: @php
                    $arr_cate = [];
                    $story_id = $stories->id;
                    $story = \App\Models\Category::whereHas('stories', function (\Illuminate\Database\Eloquent\Builder $q) use ($story_id) {
                        $q->where('stories.id', '=', $story_id);
                    })
                        ->take(2)
                        ->get();
                    foreach ($story as $item) {
                        // $arr_cate[] = '<a href="' . route('author.detail', $item->id) . '">' . $item->name . '</a>';
                        $arr_cate[] = $item->category_name;
                    }
                    echo implode(', ',$arr_cate) . ' ...';
                @endphp<br>
                Trạng thái: <b>{{ $stories->status }}</b><br>
                Mô tả:<b id="block">{!! Str::limit($stories->publish, 400, " <a href=''>xem thêm</a>" . '...') !!}</b>

            </div>
            <div class="col-3">
                <hr>
            </div>
        </div>
    </div>

@endsection
