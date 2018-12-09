<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function usercounts($user) {
        $count_tasks = $user->tasks()->count();
        
        return[
            'count_tasks' => $count_tasks,
        ];
    }
    
    public function groupcounts($group) {
        $count_group_join_users = $group->in_users()->count();
        $count_group_tasks = $group->tasks()->count();
        
        return[
            'count_group_join_users' => $count_group_join_users,
            'count_group_tasks' => $count_group_tasks,
        ];
    }
    
//    public function taskcounts($task) {
//     $count_comments = $task->
//    }
}