<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function saveComment(Request $request){
        Comment::saveComments($request);
        return back();
    }
}
