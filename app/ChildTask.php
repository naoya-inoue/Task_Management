<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Group;
use App\Task;

class ChildTask extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
