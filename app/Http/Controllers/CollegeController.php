<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\College;
use App\AppUser;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            $colleges = College::All();
            //$colleges = College::all();
            return view('college.index',[ 'colleges' => $colleges]);
        }
        else{
            return redirect('/CLUser');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin'){
            return view('college.create');
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
            $photoName = time().'.'.$request->file('imagefile')->extension();
            $request->file('imagefile')->move(public_path('college_logo'), $photoName);
            
            $college = new College();
            $college->name = $request->name;
            $college->city = $request->city;
            $college->state = $request->state;
            $college->logo = $photoName;
            $college->description = $request->description;
            $college->active = $request->active;
            $college->website = $request->website;
            $college->email_domain = $request->email_domain;
            $college->save();
            return redirect('/college')->with('status', 'College Added '.$request->name);
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
            $college = College::find($id);
            $users = DB::table('app_users')->where('college', '=', $college->name)->get();
            return view('college.show')->with('users',$users)->with('college', $college);
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
            $college = College::find($id);
            
            return view('college.edit', compact('college','id'));
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
            $college = College::find($id);
            
            $college->name = is_null($request->name)?$college->name:$request->name;
            $college->city = is_null($request->city)?$college->city:$request->city;
            $college->state = is_null($request->state)?$college->state:$request->state;
            $college->description = is_null($request->description)?$college->description:$request->description;
            $college->active = is_null($request->active)?$college->active:$request->active;
            $college->website = is_null($request->website)?$college->website:$request->website;
            $college->email_domain = is_null($request->email_domain)?$college->email_domain:$request->email_domain;
            $college->save();
            return redirect('/college')->with('status', 'College Details Modified '.$request->name);
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
            $college = College::find($id);
            $college->delete();

            return redirect('/college')->with('status', 'College Deleted ');
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function open($id)
    {
        if(Auth::user()->role == 'Admin'){
            $user = AppUser::find($id);
            $college = DB::table('colleges')->where('name', '=', $user->college)->first();
            

            return redirect('/college/'.$college->id);
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function newcollege(){
        if(Auth::user()->role == 'Admin'){
            $colleges = DB::table('college_requests')->get();
            return view('college.new',[ 'colleges' => $colleges]);
        }
        else{
            return redirect('/CLUser');
        }
    }

    public function destroynew($id)
    {
        if(Auth::user()->role == 'Admin'){
           DB::table('college_requests')->where('id', '=', $id)->delete();

            return back()->with('status', 'College Deleted ');
        }
        else{
            return redirect('/CLUser');
        }
    }
}
