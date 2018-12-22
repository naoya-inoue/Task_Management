<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function now()
    {
        return $now = date("y/m/d H:i");
    }
    //ユーザ情報
    public function usercounts($user) 
    {
        $count_tasks = $user->tasks()->count();
        return[
            'count_tasks' => $count_tasks,
        ];
    }
    public function groupcounts($group) {
        $count_group_join_users = $group->in_users()->count();
        $count_group_tasks = $group->tasks()->count();
        $count_group_tasks_not = count($group->feed_grouptasks_not());
        $count_group_tasks_comp = count($group->feed_grouptasks_comp());
        
        return [
            'count_group_tasks' => $count_group_tasks,
            'count_group_join_users' => $count_group_join_users,
            'count_group_tasks_not' => $count_group_tasks_not,
            'count_group_tasks_comp' => $count_group_tasks_comp,
        ];
    }
    public function commentcount($task) {
        $count_comments = $task->feed_comments()->count();
        
        return $count_comments;
    }
}
    
