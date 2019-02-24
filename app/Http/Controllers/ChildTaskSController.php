<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\ChildTask;

class ChildTaskSController extends Controller
{
    public function update(Request $request)
    {
        
        $taskId = Task::find($request->task);
        $ToDoArr = $taskId->feed_ToDo();
        
        
        //Taskが持っているChildTaskすべてをリセット
        foreach($ToDoArr as $ToDo)
        {
            $ToDoCheck = ChildTask::find($ToDo->id);
            $ToDoCheck->status = '0';
            $ToDoCheck->save();
        }
        // exit(dump($request->ToDoCheck));
        //チェックがすべて外された状態かどうか
        if(($request->ToDoCheck) != null){
            //チェックがついている処理
            foreach($request->ToDoCheck as $Check_ChildTaskId)
            {
                $ToDoCheck = ChildTask::find($Check_ChildTaskId);
                $ToDoCheck->status = '1';
                $ToDoCheck->save();
            }
        }
        
        return redirect()->back();
    }
    
    public function store(Request $request)
    {
        
        // exit(var_dump($request->ToDo));
        $this->validate($request,[
            'ToDo' => 'required',
            ]);
        
        $task = Task::find($request->task);
        $ctask = new ChildTask;
        $ctask->ToDo = $request->ToDo;
        $ctask->status = 0;
        $ctask->task_id = $task->id;
        $ctask->save();
        
        return redirect()->back();
    }

}
