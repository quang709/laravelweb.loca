<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function getDelete($id, $id_news)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('admin/news/edit/' . $id_news)->with('messenger', 'delete conmment success');
    }

    public function postComment(Request $request, $id)
    {
        $this->validate($request, ['Content' => 'required'], ['Content.required' => 'Content required']);

        $id_news = $id;
        $news = News::find($id);
        $comment = new Comment;
        $comment->id_news = $id_news;
        $comment->id_user = Auth::user()->id;
        $comment->content = $request->Content;
        $comment->save();

        return redirect("news/" . $news->title_url);

    }
}
