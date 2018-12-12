<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;

class GroupsTasksController extends Controller
{

    public function create(Request $request, $id)
    {
        $group = Group::find($id);
        $task = new Task;

        return view('grouptasks.create', [
            'task' => $task,
            'title' => $task->title,
            'content' => $task->content,
            'deadline' => $task->deadline,
            'group' => $group,
        ]);
    }


    public function store(Request $request, $id)
    {
//        var_dump($request->id);
//        exit();
        $group = Group::find($request->id);
        $gtask = new Task;
        $gtask->title = $request->title;
        $gtask->content = $request->content;
        $gtask->deadline = $request->deadline;
        $gtask->status = 0;
        $gtask->save();
        $group->add_task($gtask->id);
        
        return redirect()->route('groups.show', ['id' => $group]);
    }
    public function index(Request $request)
    {
        $group = Group::find($request->id);
        $grouptasks = $group->feed_grouptasks();

        return view('grouptasks.index', [
            'grouptasks' => $grouptasks,
            'group' => $group,
        ]);
    }

}
