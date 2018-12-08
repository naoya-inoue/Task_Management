<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'deadline','status'];
    
//ユーザ
    public function user()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id');
    }

//グループ
    public function group()
    {
        return $this->belongsToMany(Group::class, 'task_groups', 'task_id', 'group_id');
    }
    
//コメント
    public function comment()
    {
        return $this->belongsToMany(Comment::class, 'users_comments', 'task_id', 'comment_id');
    }
}