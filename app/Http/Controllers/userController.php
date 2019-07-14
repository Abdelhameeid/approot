<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all();
        $allRoles=Role::all();
        return view('dashboard.role.user',compact(['users','allRoles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $roles=Role::all();
        return view('dashboard.role.createuser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user=User::create($request->except(['role','_token']));
         $user->roles()->attach($request->role);
         return redirect()->route('user.index')->withMessage('user created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user=User::find($id);
        $roles=Role::all();
       $role_user = $user->roles()->pluck('id','id')->toArray();

         return view('dashboard.role.edituser',compact('roles','user','role_user'));
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
         $user=User::findOrFail($id);
        //$roles=$request->roles;
        //DB::table('role_user')->where('user_id',$id)->delete();
         $user->email=$request->email;
         $user->name=$request->name;
         $user->save();
        $user->roles()->detach();
        $user->roles()->attach($request->role);

       

         return redirect()->route('user.index')->withMessage('user created');
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
