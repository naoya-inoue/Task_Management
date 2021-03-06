<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\Task;

class UsersController extends Controller
{
    public function index()
    {
        if(\Auth::check()) {
            
        $user = \Auth::user();
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
        }else {
            return view('welcome');
        }
        
    }

    
    public function groups_show($id)
    {
        if(\Auth::id() == $id){
            $user = User::find($id);
            $grouplist = $user->group_list($user);
            
            $data = [
                'user' => $user,
                'grouplist' => $grouplist,
                ];
            return view('users.groups', $data);
        }else {
        return redirect()->route('users.groups.list', ['id' => \Auth::id()]);
        }
    }
    
    public function edit($id)
    {
        if(\Auth::id() == $id) {

        $user = User::find($id);
        
        return view('users.edit',[
            'user' => $user,
        ]);
    }else {
        return redirect()->route('users.edit', ['id' => \Auth::id()]);
    }
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
        $this->validate($request,[
            'name' => 'required']);
            
        if(\Auth::id() == $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('users.index', ['id' => $user]);
        
        }else {
        return redirect()->route('users.index', ['id' => \Auth::id()]);
    }

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
