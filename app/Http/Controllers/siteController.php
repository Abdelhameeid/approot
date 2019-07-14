<?php

namespace App\Http\Controllers;
use App\Service;
use App\Project;
use App\Email;
use App\Mobile;
use App\Social;
use App\Subscribe;


use Illuminate\Http\Request;

class siteController extends Controller
{
    public function index(){
    	$services=Service::all();
    	$projects=Project::all();
    	$mobiles=Mobile::all();

    	$emails=Email::all();
    	$mobiles=Mobile::all();
    	$socials=Social::all();
    	$subscribes=Subscribe::all();
    	
    	return view('start',compact('services','projects','emails','mobiles','socials','subscribes','mobiles'));

    }
     public function subscribe(Request $request){
     	 $this->validate($request,[
            'email'=>'required',
           ]);


       $subscribe=new Subscribe();
       $subscribe->email= $request->email;
       $subscribe->save();
       return back()->with('status' , 'Subscribe successfully!');
     }
}
