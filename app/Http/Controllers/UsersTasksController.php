<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;
use App\ChildTask;

class UsersTasksController extends Controller
{
    public function create(Request $request, $id)
    {
        $user = \Auth::user();
        $task = new Task;
        
        return view('usertasks.create', [
            'user' => $user,
            'title' => $task->title,
            'content' => $task->content,
            'deadline' => $task->deadline,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'deadline' => 'required',
            ]);
            
        $user = \Auth::user();
        $ptask = new Task;
        $ptask->title = $request->title;
        $ptask->content = $request->content;
        $ptask->deadline = $request->deadline;
        $ptask->status = 0;
        $ptask->save();
        $user->add_task($ptask->id);
        
    return redirect()->route('users.index', $user);
    }
    public function index(Request $request)
    {
        if(\Auth::id() == $request->id){
        $user = User::find($request->id);
        $usertasks = $user->feed_user_tasks();
        return view('usertasks.index', [
            'user_tasks' => $usertasks,
            'user' => $user,
        ]);
        }else {
            return redirect()->route('users.tasks.list', ['id' => \Auth::id()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $task)
    {
        $user = User::find($id);
        $task = Task::find($task);
        if(!is_null($user) && (!is_null($task) && ($user->is_tasks($task->id)))){
        $comments = $task->feed_comments();
        $ToDos = $task->feed_ToDo();

        $data =[
            'user' => $user,
            'task' => $task,
            'comments' => $comments,
            'ToDos' => $ToDos
            ];
        
        return view('usertasks.show', $data);
            }
        else {
          return redirect()->route('users.tasks.list', ['id' => \Auth::id()]);
        }

    }

    public function edit($id, $task)
    {
        $user = User::find($id);
        $task = Task::find($task);
        
        $data =[
            'user' => $user,
            'task' => $task,
            ];
        
        return view('usertasks.edit',$data );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $task)
    {
        $this->validate($request,[
        'title' => 'required',
        'content' => 'required',
        'deadline' => 'required',
        ]);

        $task = Task::find($task);
        $user = User::find($id);
        $task->title = $request->title;
        $task->content = $request->content;
        $task->deadline = $request->deadline;
        
        $task->save();

        $data =[
            'task' => $task,
            'user' => $user,
            ];
        return redirect()->route('user.tasks.show', ['id' => $user, 'task' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
