<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\Category;
use App\Models\Story;
use App\Models\StoryCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('id', 'desc')->paginate(7);

        return view('backend.stories.list', compact('stories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.stories.create', compact('categories'));
    }

    public function store(StoryRequest $StoryRequest)
    {
        $StoryRequest->validate([
            'image' => 'required',
        ]);

        $stories = new Story();
        $stories->fill($StoryRequest->all());

        if ($StoryRequest->hasFile('image')) {
            $image = $StoryRequest->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0, 999999) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images');

            $image->move($uploadPath, $fileName);

            $stories->image = $fileName;
        }

        $stories->save();

        $array = [];
        if (is_array($StoryRequest->category_id) && count($StoryRequest->category_id) > 0) {
            foreach ($StoryRequest->category_id as $u) {
                if (Category::find($u)) {
                    $array[] = array(
                        'category_id' => $u,
                        'story_id' => $stories->id,
                    );
                }
            }
            StoryCategory::insert($array);
        }
        return redirect()->route('stories.index')->with('message', 'Bạn đã thêm tên truyện thành công!');
    }

    public function edit($id)
    {
        $stories = Story::findOrFail($id);
        $categories = Category::all();

        return view('backend.stories.edit', compact('categories', 'stories'));
    }

    public function update(StoryRequest $StoryRequest, $id)
    {
        $stories = Story::findOrFail($id);
        $stories->fill($StoryRequest->all());

        if ($StoryRequest->hasFile('image')) {
            $getImage = DB::table('stories')->select('image')->where('id', $id)->get();
            if ($getImage[0]->image != '' && file_exists(public_path('storage/images/' . $getImage[0]->image))) {
                unlink(public_path('storage/images/' . $getImage[0]->image));
            }

            $image = $StoryRequest->file('image');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = md5(time()) . rand(0, 999999) . '.' . $fileExtension;
            $uploadPath = public_path('storage/images');

            $image->move($uploadPath, $fileName);

            $stories->image = $fileName;
        }


        $stories->save();
        $array = [];
        if (is_array($StoryRequest->category_id) && count($StoryRequest->category_id) > 0) {
            StoryCategory::where('story_id', $stories->id)->delete();
            foreach ($StoryRequest->category_id as $u) {
                if (Category::find($u)) {
                    $array[] = array(
                        'category_id' => $u,
                        'story_id' => $stories->id,
                    );
                }
            }
            StoryCategory::insert($array);
        }
        return redirect()->route('stories.index')->with('message', 'Bạn đã sửa tên truyện thành công!');
    }

    public function destroy($id)
    {
        $stories = Story::findOrFail($id);
        $stories->delete();

        return redirect()->route('stories.index')->with('message', 'Bạn đã xóa tên truyện thành công!');
    }
}
