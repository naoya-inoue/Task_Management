<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Group;
use App\Task;


class Group extends Model
{
    protected $fillable = ['group_name', 'group_explanation'];
    
    public function in_users()
    {
        return $this->belongsToMany(User::class, 'users_joining', 'group_id', 'user_id')->withTimestamps();
    }
    
//グループタスク
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_groups', 'group_id', 'task_id')->withTimestamps();
    }
//グループタスクの中間テーブルへ追加
    public function add_task($taskId)
    {
        $this->tasks()->attach($taskId);
    }
//中間テーブルに存在するか
    public function is_groups($groupId)
    {
        return $this->groups()->where('group_id', $groupId)->exists();
    }
//タスク一覧取得
    public function feed_grouptasks()
    {
        $grouptask_ids = $this->tasks()->pluck('tasks.id')->toArray();
        return Task::whereIn('id', $grouptask_ids)->get();
    }
//ユーザ一覧取得(参加ユーザカウントにも使用)
    public function feed_joinusers()
    {
        $user_ids = $this->in_users()->pluck('users.id')->toArray();
        return User::whereIn('id', $user_ids)->get();
    }
//進行中のタスク一覧
    public function feed_grouptasks_not()
    {
        $grouptask_ids = $this->tasks()->pluck('tasks.id')->toArray();
        $grouptask_ids = Task::whereIn('id', $grouptask_ids)->get();
        foreach($grouptask_ids as $tasks) {
            if ($tasks->status == 1) {
            
                $not_grouptask_ids [] = $tasks;
            } else {
                $not_grouptask_ids  = [];
            }
            
        }
        return $not_grouptask_ids;
    }
//完了のタスク一覧
    public function feed_grouptasks_comp()
    {
        $grouptask_ids = $this->tasks()->pluck('tasks.id')->toArray();
        $grouptask_ids = Task::whereIn('id', $grouptask_ids)->get();
        foreach($grouptask_ids as $tasks) {
            if ($tasks->status == 2) {
            
                $comp_grouptask_ids[] = $tasks;
            } else {
                $comp_grouptask_ids  = [];
            }
        }
        return $comp_grouptask_ids;
    }
//    public function deletegroup($id)
//    {
//        
//    }
}
