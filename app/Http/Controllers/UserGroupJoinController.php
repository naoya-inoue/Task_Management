<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGroupJoinController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->join_group($id);
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->leave_group($id);
        return redirect()->back();
    }
}
