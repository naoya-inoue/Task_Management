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
    public function add_task($taskId)
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
//グループリスト
    public function group_list($id)
    {
        $groups = $this->groups()->pluck('groups.id')->toArray();
        return Group::whereIn('id', $groups)->get();
    }
//参加グループタスク一覧取得
    public function feed_user_join_grouptasks()
    {
        $group_ids = $this->groups()->pluck('groups.id')->toArray();
        $group_ids = Group::whereIn('id', $group_ids)->get();
        if(count($this->groups()->pluck('groups.id')->toArray()) > 0){
        foreach($group_ids as $group) {
            $task_ids = $group->tasks()->pluck('tasks.id')->toArray();
            $task = Task::whereIn('id', $task_ids)->get();
                $grouptask_ids [] = $task;
        }}else {
                $grouptask_ids = [];
                }
            return $grouptask_ids;
        }
//ユーザタスク一覧
    public function feed_user_tasks()
    {
        $user_tasks = $this->tasks()->pluck('tasks.id')->toArray();
        return Task::whereIn('id', $user_tasks)->get();
    }
//コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }    
    
}