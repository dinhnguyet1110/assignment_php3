<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{
    const PATH_VIEW = 'admin.new.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::with('category')->latest()->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('news', $request->file('image'));
        }

        News::query()->create($data);
        return redirect()->route('admin.new.index')->with('success', 'Tin đã được thêm mới thành công.');
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $model = News::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $news = News::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }

            $data['image'] = Storage::put('news', $request->file('image'));
        }

        $news->update($data);
        return redirect()->route('admin.new.index')->with('success', 'Tin đã được cập nhật thành công.');
    }
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            if (Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }
        }
        $news->delete();

        return redirect()->route('admin.new.index')->with('success', 'Tin đã được Xóa thành công.');
    }

    // hiển thị tất cả
    public function show_news()
    {
        $news = News::paginate(6);
        $hotNews = DB::table('news')->where('is_hot', 1)->get();
        return view('client.news', compact('news', 'hotNews'));
    }

    // chi tiết tin
    public function show_ct($id)
    {
        $news = News::findOrFail($id);
        $news->increment('views');
        return view('client.show-ct', compact('news'));
    }

    // tìm kiếm 
    public function search(Request $request)
    {
        $query = $request->input('query');

        $news = News::where('content', 'LIKE', "%{$query}%")
            ->orWhere('title', 'LIKE', "%{$query}%")
            ->latest()
            ->get();

        $category = Category::where('name', 'LIKE', "%{$query}%")
            ->get();

        return view('client.search', compact('news', 'category', 'query'));
    }
}
