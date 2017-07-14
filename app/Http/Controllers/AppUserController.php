<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AppUser;
use App\College;

class AppUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //return view('appuser.create')->with('college', $id);
    }

    public function createuser(College $college)
    {
        if(Auth::user()->role == 'Admin'){
            return view('appuser.create')->with('college', $college);
        }
        else{
            return redirect('/CLUser');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role == 'Admin'){
            $user = new AppUser();
            $user->name = $request->name;
            $user->college = $request->college;
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
            return redirect('/college/'.$request->collegeid)->with('status', 'User Added '.$request->name);
        } 
        else{
            return redirect('/CLUser');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            return view('appuser.show',[ 'user' => $user]);
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function display($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            return view('appuser.display',[ 'user' => $user]);
        }
        else{
            return redirect('/CLUser');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            return view('appuser.edit',[ 'user' => $user]);
        }
        else{
            return redirect('/CLUser');
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
        if(Auth::user()->role == 'Admin'){
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
            return redirect('/appuser/'.$id)->with('status', 'User Details Updated '.$request->name);
        }
        else{
            return redirect('/CLUser');
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
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            $user->delete();

            return back()->with('status', 'User Deleted ');
        }
        else{
            return redirect('/CLUser');
        }
    }
    public function destroybanneduser($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            $user->delete();

            return back()->with('status', 'User Deleted ');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function bantoggle($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            $entry = (is_null($user->ban)||!($user->ban))?true:false;

            DB::table('app_users')
                ->where('id', $id)
                ->update(['ban' => $entry]);

            return back()->with('status', $entry?'User Banned':'User Unbanned');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function verifyuser($id)
    {
        if(Auth::user()->role == 'Admin'){
            $mytime = \Carbon\Carbon::now();

            DB::table('app_users')
                ->where('id', $id)
                ->update(['verified' => true]);
            DB::table('app_users')
                ->where('id', $id)
                ->update(['verification_timestamp' => $mytime->toDateTimeString()]);

            return back()->with('status', 'User Verified');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function verifyemail($id)
    {
        if(Auth::user()->role == 'Admin'){
            DB::table('app_users')
                ->where('id', $id)
                ->update(['email_verified' => true]);

            return back()->with('status', 'Email Verified');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function verifymobile($id)
    {
        if(Auth::user()->role == 'Admin'){
            DB::table('app_users')
                ->where('id', $id)
                ->update(['mobile_verified' => true]);

            return back()->with('status', 'Mobile Verified');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function bannedusers()
    {
        if(Auth::user()->role == 'Admin'){
            $users = DB::table('app_users')->where('ban', '=', true)->get();
            return view('appuser.banned',[ 'users' => $users]);
        }
        else{
            return redirect('/CLUser');
        }
    }
}
