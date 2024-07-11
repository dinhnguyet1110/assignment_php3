<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $newsId)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $news = News::findOrFail($newsId);

        $comment = new Comment();
        $comment->news_id = $news->id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('show-ct', ['id' => $news->id])->with('success', 'Bình luận đã được gửi.');

    }
}

