<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskStatusController extends Controller
{
    public function store(Request $request, $id)
    {
        $task = Task::find($id);
        $task->status();
        
        return redirect()->back();
    }
    
    
}
