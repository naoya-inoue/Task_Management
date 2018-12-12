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
        $this->groups()->where('group_id', $groupId)->exists();
    }
//タスク一覧取得
    public function feed_grouptasks()
    {
        $grouptask_ids = $this->tasks()->pluck('tasks.id')->toArray();
        return Task::whereIn('id', $grouptask_ids)->get();
    }

//    public function deletegroup($id)
//    {
//        
//    }
}
