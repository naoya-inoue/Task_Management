<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;

class UsersController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = User::find($id);
        $tasks = $user->feed_user_tasks();
        $grouptasks = $user->feed_user_join_grouptasks();
        $grouplist = $user->group_list($user);

            $data= [
            'user' => $user,
            'ptasks' => $tasks,
            'grouptasks' => $grouptasks,
            'grouplist' => $grouplist,
            ];

        return view('users.index', $data);
    }

    
    public function groups_show($id)
    {
        $user = User::find($id);
        $grouplist = $user->group_list($user);
        
        $data = [
            'user' => $user,
            'grouplist' => $grouplist,
            ];
        return view('users.groups', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        
        return view('users.show',[
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
