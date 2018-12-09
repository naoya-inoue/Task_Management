<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//一覧表示は中間テーブルに含まれるもの
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = new Group;
        
        return view('groups.create', [
            'group_name' => $group->group_name,
            'group_explanation' => $group->group_explanation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $group = new Group;
        $group->group_name = $request->group_name;
        $group->group_explanation = $request->group_explanation;
        $group->save();
        $user->join_group($group->id);
//作成したユーザをusers_joiningテーブルに入れる

        return redirect()->route('groups.show', ['id' => $group]);
//        return view('groups.show',[
//            'group' => $group,
//            'user' => $user,
//        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        $user = \Auth::id();

        $data =[
            'group' => $group,
            'user' => $user,
            ];
            
        return view('groups.show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        
        return view('groups.edit',[
            'group' => $group,
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
        $group = Group::find($id);
        $user = \Auth::id();
        $group->group_name=$request->group_name;
        $group->group_explanation=$request->group_explanation;
        $group->save();
        
        $data =[
            'group' => $group,
            'user' => $user,
            ];
        
        return view('groups.show', $data
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        
        if (\Auth::user()->is_groups($group->id)){
            $group->delete();
        }
        
        return redirect()->route('users.show', ['user' => \Auth::user() ]);
    }
}
