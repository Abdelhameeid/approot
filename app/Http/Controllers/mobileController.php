<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class mobileController extends Controller
{
     public function __constuct() {
        $this->middleware('permission:mobile-index')->only('index');
        $this->middleware('permission:mobile-create')->only(['store', 'create']);
        $this->middleware('permission:mobile-show')->only('show'); 
        $this->middleware('permission:mobile-delete')->only('destroy');
        $this->middleware('permission:mobile-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mobiles  = Mobile::all();
        return view('dashboard.mobile.index', compact('mobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('dashboard.mobile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'mobile'=>'required',
            'order'=>'required'           
           ]);  
           $mobile = new Mobile;
             $mobile->mobile = $request->mobile;
             $mobile->order=$request->order;
             $mobile->save();
             return redirect()->route('mobile.index')->with('status' , 'mobile created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $mobile=Mobile::find($id);
        return view('dashboard.mobile.show',compact('mobile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $mobile=Mobile::find($id);
        return view('dashboard.mobile.edit',compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mobile)
    {
        
          $this->validate($request,[
            'order'=>'required',
            'mobile'=>'required', 
          
           ]);  
          
            

             $mobile = Mobile::find($mobile);
             $mobile->order = $request->order;
             $mobile->mobile = $request->mobile;

              $mobile->save();
        return redirect()->route('mobile.index')->with('status' ,'Mobile Updated suucssefully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mobile)
    {
          $mobile=Mobile::find($mobile);
            $mobile->delete();
        return redirect()->route('mobile.index')->with('status' ,'Mobile Deleted suucssefully');;
    }
}
