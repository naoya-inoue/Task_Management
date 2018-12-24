<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request,$task)
    {
        $this->validate($request,[
        'comment' =>'required',
        ]);

        $user = \Auth::user();
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = $user->id;
        $comment->save();
        $comment->task($task);
        
        return redirect()->back();
    }
}
