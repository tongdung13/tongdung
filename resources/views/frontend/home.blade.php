@extends('layouts.frontend')

@section('title', 'Đọc truyện online')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <table class="table" border="1">
                    @foreach ($stories as $story)
                        <tr>
                            <td>{{ $story->story_name . ' new' }}</td>
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
                                echo implode(', ', $arr_cate);
                            @endphp
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>

@endsection
