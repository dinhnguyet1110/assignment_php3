<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

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
        ]);
        News::create($request->all());
        return redirect()->route('admin.new.index');
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $model = News::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'published_date' => 'required|date',
        ]);

        $news->update($request->all());


        return redirect()->route('admin.new.index');
    }
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    
        return redirect()->route('admin.new.index');
    }

    // hiển thị tất cả
    public function show_news()
    {
        $news = News::all(); 
        $hotNews = News::where('is_hot', true)->get();
        return view('user.news', compact('news','hotNews'));
    }

    // chi tiết tin
    public function show_ct($id)
    {
        $news = News::findOrFail($id);
        return view('user.show-ct', compact('news'));
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
        
        return view('user.search', compact('news', 'category', 'query'));
    }
    
}
