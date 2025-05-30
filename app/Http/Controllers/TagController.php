<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // لیست تگ‌ها
    public function index()
    {
        $tags = Tag::all();
        return view('panel.tags.index', compact('tags'));
    }

    // نمایش فرم ایجاد تگ جدید
    public function create()
    {
        return view('panel.tags.create');
    }

    // ذخیره تگ جدید
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($request->only(['name']));

        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }

    // نمایش فرم ویرایش تگ
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('panel.tags.edit', compact('tag'));
    }

    // بروزرسانی تگ
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($request->only(['name']));

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully!');
    }

    // حذف تگ
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully!');
    }
}
