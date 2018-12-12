<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;

class UsersTasksController extends Controller
{
    public function create()
    {
        $user = \Auth::user();
        $task = new Task;
        
        return view('usertasks.create', [
            'title' => $task->title,
            'content' => $task->content,
            'deadline' => $task->deadline,
        ]);
    }
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $ptasks = $user->tasks()->orderBy('deadline')->pagenate(10);
            
            $data = [
                'user' => $user,
                'ptasks' => $ptasks,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');   
        }
    }
    public function store(Request $request)
    {
        $user = \Auth::user();
        $ptask = new Task;
        $ptask->title = $request->title;
        $ptask->content = $request->content;
        $ptask->deadline = $request->deadline;
        $ptask->status = 0;
        $ptask->save();
        $user->add_task($ptask->id);
        
    return redirect()->route('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
