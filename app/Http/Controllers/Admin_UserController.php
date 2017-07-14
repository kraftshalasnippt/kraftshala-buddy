<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Admin_UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            $admin_users = User::all();
            return view('admin_user.index',[ 'admin_users' => $admin_users]);
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function create()
    {
        if(Auth::user()->role == 'Admin'){
            return view('admin_user.create');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->role == 'Admin'){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->college = $request->college;
            $user->save();
            return redirect('/admin_user')->with('status', 'User Added '.$request->name);
        }
        else{
            return redirect('/CLUser');
        }
    }

    /*public function edit($id)
    {
        $user = User::find($id);
        
        return view('edit', compact('user','id'));

    }*/

    public function edit($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = User::find($id);
            
            return view('admin_user.edit', compact('user','id'));
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = User::find($id);
            $user->name = is_null($request->name)?$user->name:$request->name;
            $user->email = is_null($request->email)?$user->email:$request->email;
            $user->phone = is_null($request->phone)?$user->phone:$request->phone;
            $user->role = is_null($request->role)?$user->role:$request->role;
            $user->college = is_null($request->college)?$user->college:$request->college;
            $user->save();
            return redirect('/admin_user')->with('status', 'User Details Modified '.$request->name);
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function destroy($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = User::find($id);
            $user->delete();

            return redirect('/admin_user')->with('status', 'User Deleted ');
        }
        else{
            return redirect('/CLUser');
        }
    }
}
