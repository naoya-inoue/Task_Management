<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Group;
use App\Task;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'deadline','status'];
    
//ユーザ
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id')->withTimestamps();
    }

//グループ
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'task_groups', 'task_id', 'group_id')->withTimestamps();
    }
    
//コメント
    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'users_comments', 'task_id', 'comment_id');
    }
}