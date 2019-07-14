<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\DB;



class roleController extends Controller
{

         public function __constuct() {
        $this->middleware('permission:role-index')->only('index');
        $this->middleware('permission:role-create')->only(['store', 'create']);
        $this->middleware('permission:role-show')->only('show'); 
        $this->middleware('permission:role-delete')->only('destroy');
        $this->middleware('permission:role-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles=Role::all();
       
         return view('dashboard.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $permissions=Permission::all();
        return view('dashboard.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $role=Role::create($request->except(['permission','_token']));
         $role->permissions()->attach($request->permission);
        // foreach ($request->permission as $key=>$value){
        //     $role->attachPermission($value);
        // }

        return redirect()->route('role.index')->with('status' ,'Role created suucssefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
          $role=Role::find($role);

         return view('dashboard.role.showrole',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $role=Role::find($id);
        $permissions=Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();

         return view('dashboard.role.edit',compact('role','permissions','role_permissions'));
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
         $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        $role->permissions()->detach();
        $role->permissions()->attach($request->permission);
    

        return redirect()->route('role.index')->with('status' ,'Role Updated suucssefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table("roles")->where('id',$id)->delete();
        return back()->withMessage('Role Deleted');

    }
}
