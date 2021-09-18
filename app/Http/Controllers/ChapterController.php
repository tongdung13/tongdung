<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::orderBy('id', 'desc')->paginate(7);

        return view('backend.chapters.list', compact('chapters'));
    }

    public function create()
    {
        $stories = Story::all();
        return view('backend.chapters.create', compact('stories'));
    }

    public function store(ChapterRequest $ChapterRequest)
    {
        $chapters = new Chapter();
        $chapters->fill($ChapterRequest->all());
        $chapters->save();

        return redirect()->route('chapters.index')->with('message', 'Bạn đã thêm chương thành công!');
    }

    public function show($id)
    {
        $chapters = Chapter::findOrFail($id);

        return view('backend.chapters.detail', compact('chapters'));
    }

    public function edit($id)
    {
        $chapters = Chapter::findOrFail($id);
        $stories = Story::all();

        return view('backend.chapters.edit', compact('stories', 'chapters'));
    }

    public function update(ChapterRequest $ChapterRequest, $id)
    {
        $chapters = Chapter::findOrFail($id);
        $chapters->fill($ChapterRequest->all());
        $chapters->save();

        return redirect()->route('chapters.index')->with('message', 'Bạn đã sửa chương thành công!');
    }

    public function destroy($id)
    {
        $chapters = Chapter::findOrFail($id);
        $chapters->delete();

        return redirect()->route('chapters.index')->with('message', 'Bạn đã xóa chương thành công!');
    }
}
