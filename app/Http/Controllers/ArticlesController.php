<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Article;
use App\Follow;
use Auth;
use Log;

class ArticlesController extends Controller
{
    /** Return array of article created by a follewed user or creaty by the user himself
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $followed_users = Follow::select('target_id')->where('follower_id', Auth::id())->get();
        $articles = Article::whereIn('user_id', $followed_users)->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        Article::create($request->all());

        return redirect('/articles');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = Comment::where('article_id', $article->id)->get();

        return view('articles.show', compact('article'), compact('comments'));
    }

    public function edit($id)
    {
        // We get the list of articles_id owned by connected user
        $user_articles = Article::where('user_id', Auth::id())->pluck('id')->toArray();

        // check if article witch is trying to be edited is owned by current user
        $owned_article = in_array($id, $user_articles);

        //if it is we return the edit view
        if ($owned_article) {
            $article = Article::findOrFail($id);
            return view('articles.edit', compact('article'));
        } else {
            //return view unauthorized
            return view('errors.401');
        }
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('/articles');
    }

    public function destroy($id) {
        Article::destroy($id);
    }
}
