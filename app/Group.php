<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function task($taskId)
    {
        $this->tasks()->attach($taskId);
    }
}
