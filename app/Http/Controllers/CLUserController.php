<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AppUser;

class CLUserController extends Controller
{
    public function index()
    {
        return view('CLUser.index');
    }

    public function users($col)
    {
        $users = DB::table('app_users')->where('college', '=', $col)->get();
        return view('CLUser.users')->with('users',$users)->with('college', $col);
    }

    public function bannedusers($col)
    {
        $users = DB::table('app_users')->where([['college', '=', $col],['ban', '=', true],])->get();
        return view('CLUser.bannedusers')->with('users',$users)->with('college', $col);
    }

    public function destroy($id)
    {
    	$user = AppUser::find($id);
        $user->delete();

        return back()->with('status', 'User Deleted ');
    }

    public function show($id)
    {
        $user = AppUser::find($id);
        return view('CLUser.show',[ 'user' => $user]);
    }

    public function display($id)
    {
        $user = AppUser::find($id);
        return view('CLUser.display',[ 'user' => $user]);
    }

    public function bantoggle($id)
    {
        $user = AppUser::find($id);
        $entry = (is_null($user->ban)||!($user->ban))?true:false;

        DB::table('app_users')
            ->where('id', $id)
            ->update(['ban' => $entry]);

        return back()->with('status', $entry?'User Banned':'User Unbanned');
    }

    public function verifyuser($id)
    {
        $mytime = \Carbon\Carbon::now();

        DB::table('app_users')
            ->where('id', $id)
            ->update(['verified' => true]);
        DB::table('app_users')
            ->where('id', $id)
            ->update(['verification_timestamp' => $mytime->toDateTimeString()]);

        return back()->with('status', 'User Verified');
    }

    public function verifyemail($id)
    {
        DB::table('app_users')
            ->where('id', $id)
            ->update(['email_verified' => true]);

        return back()->with('status', 'Email Verified');
    }

    public function verifymobile($id)
    {
        DB::table('app_users')
            ->where('id', $id)
            ->update(['mobile_verified' => true]);

        return back()->with('status', 'Mobile Verified');
    }

    public function edit($id)
    {
        $user = AppUser::find($id);
        return view('CLUser.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        if(!is_null($request->name)){
            DB::table('app_users')
            ->where('id', $id)
            ->update(['name' => $request->name]);
        }
        if(!is_null($request->email)){
            DB::table('app_users')
            ->where('id', $id)
            ->update(['email' => $request->email]);
        }
        if(!is_null($request->mobile)){
            DB::table('app_users')
            ->where('id', $id)
            ->update(['mobile' => $request->mobile]);
        }
        if(!is_null($request->year_of_graduation)){
            DB::table('app_users')
            ->where('id', $id)
            ->update(['year_of_graduation' => $request->year_of_graduation]);
        }
        if(!is_null($request->description)){
            DB::table('app_users')
            ->where('id', $id)
            ->update(['description' => $request->description]);
        }
        return redirect('/CLUser/show/'.$id)->with('status', 'User Details Updated '.$request->name);
    }

    public function create()
    {
        return view('CLUser.create');
    }

    public function store(Request $request)
    {
        $user = new AppUser();
        $user->name = $request->name;
        $user->college = Auth::user()->college;
        $user->year_of_graduation = $request->year_of_graduation;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->status=='Student'){
            $user->student = true;
            $user->alumni = false;
        }
        else{
            $user->student = false;
            $user->alumni = true;
        }
        $user->save();
        return redirect('/CLUser/users/'.$user->college)->with('status', 'User Added '.$request->name);    
    }
}
