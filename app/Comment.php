<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id'];
    
//コメントモデル(1)から見たユーザモデル(多)の関係
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
//コメントモデル(多)から見たタスクモデル(多)の関係    
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'users_comments', 'comment_id', 'task_id')->withTimestamps();
    }
//コメントとタスクの中間テーブルに入れる
    public function task($taskId)
    {
        $this->tasks()->attach($taskId);
    }
}
