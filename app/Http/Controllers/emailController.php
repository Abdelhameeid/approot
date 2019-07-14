<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;

class emailController extends Controller
{
    public function __constuct() {
        $this->middleware('permission:email-index')->only('index');
        $this->middleware('permission:email-create')->only(['store', 'create']);
        $this->middleware('permission:email-show')->only('show'); 
        $this->middleware('permission:email-delete')->only('destroy');
        $this->middleware('permission:email-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $emails  = Email::all();
        return view('dashboard.email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('dashboard.email.create');
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
            'email'=>'required',
            'order'=>'required'           
           ]);  
           $email = new Email;
             $email->email = $request->email;
             $email->order=$request->order;
             $email->save();
             return redirect()->route('email.index')->with('status' ,'Email created suucssefully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email=Email::find($id);
        return view('dashboard.email.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $email=Email::find($id);
        return view('dashboard.email.edit',compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
         $this->validate($request,[
            'order'=>'required',
            'email'=>'required', 
          
           ]); 
            $email = Email::find($email);
             $email->order = $request->order;
             $email->email = $request->email; 
              $email->save();
        return redirect()->route('email.index')->with('status' ,'Email Updated suucssefully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
         $email=Email::find($email);
            $email->delete();
        return redirect()->route('email.index')->with('status' ,'Email Deleted suucssefully');
    }
}
