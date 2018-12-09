<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
//タスク
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_users', 'user_id', 'task_id')->withTimestamps();
    }
//タスクを中間テーブルに
    public function task($taskId)
    {
        $this->tasks()->attach($taskId);
    }
    
//グループ
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'users_joining', 'user_id', 'group_id')->withTimestamps();
    }
//グループ参加
    public function join_group($groupId)
    {
        $this->groups()->attach($groupId);
    }
//グループ退会
    public function leave_group($groupId)
    {
        $this->groups()->detach($groupId);
    }
//中間テーブルに存在するか
    public function is_groups($groupId)
    {
        return $this->groups()->where('group_id', $groupId)->exists();
    }
    
    
//コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }    
    
//    public function tasks()
//    {
//        return $this->hasMany(Task::class);
//    }

    
    
}
