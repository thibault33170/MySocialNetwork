<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Log;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        Comment::create($request->all());
    }
}
