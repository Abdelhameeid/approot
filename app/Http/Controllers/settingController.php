<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Storage;
use Image;

use LaravelLocalization;
use Illuminate\Support\Facades\Auth;

class settingController extends Controller
{
     public function __constuct() {

        $this->middleware('permission:setting-edit')->only('edit','update');

    }
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user=Auth::user();
         $settings  = Setting::all();
        return view('dashboard.setting.index', compact('settings','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user=Auth::user();
       // dd($user);
        return view('dashboard.setting.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('Logo')){

            $imageExt=$request->file('Logo')->getClientOriginalExtension();
            $imageName1=time().'thumnnail1.'.$imageExt;
             $thumbnailpath1 = storage_path('app\\public\\'.$imageName1);
        $img = Image::make($request->Logo)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath1);
            //$request->file('image')->storeAs('public',$imageName);   
            }
             if($request->hasFile('icon')){


            $imageExt=$request->file('icon')->getClientOriginalExtension();
            $imageName2=time().'thumnnail2.'.$imageExt;
            $thumbnailpath2 = storage_path('app\\public\\'.$imageName2);
        $img = Image::make($request->icon)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath2);
            //$request->file('image')->storeAs('public',$imageName);   
            }

            if($request->hasFile('cover')){

            $imageExt=$request->file('cover')->getClientOriginalExtension();
            $imageName3=time().'thumnnail3.'.$imageExt;
            $thumbnailpath3 = storage_path('app\\public\\'.$imageName3);
        $img = Image::make($request->cover)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath3);
            //$request->file('image')->storeAs('public',$imageName);   
            }

             $setting = new Setting;
             $setting->logo=$imageName1;
             $setting->icon=$imageName2;
             $setting->cover=$imageName3;


             
            $setting->title    = $request->title;
            $setting->desc   = $request->desc;

        
        $setting->save();
        return redirect()->route('hello')->with('status','ojhihihihi');
        //return redirect()->route('service_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $user=Auth::user();
        $setting=Setting::find($id);
        return view('dashboard.setting.show',compact('setting','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user=Auth::user();
        $setting=Setting::find($id);
        return view('dashboard.setting.edit',compact('setting','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $setting)
    {

          if($request->hasFile('Logo')){

            $imageExt=$request->file('Logo')->getClientOriginalExtension();
            $imageName1=time().'thumnnail1.'.$imageExt;
            $thumbnailpath1 = storage_path('app\\public\\'.$imageName1);
        $img = Image::make($request->Logo)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath1);
            //$request->file('image')->storeAs('public',$imageName);   
            }
             if($request->hasFile('icon')){

            $imageExt=$request->file('icon')->getClientOriginalExtension();
            $imageName2=time().'thumnnail2.'.$imageExt;
           $thumbnailpath2 = storage_path('app\\public\\'.$imageName2);
        $img = Image::make($request->icon)->resize(100, 100, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath2);
            //$request->file('image')->storeAs('public',$imageName);   
            }
            if($request->hasFile('cover')){

            $imageExt=$request->file('cover')->getClientOriginalExtension();
            $imageName3=time().'thumnnail3.'.$imageExt;
            $thumbnailpath3 = storage_path('app\\public\\'.$imageName3);
        $img = Image::make($request->cover)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath3);
            //$request->file('image')->storeAs('public',$imageName);   
            }

             $setting = Setting::find($setting);

            if($request->hasFile('Logo')){
            
             $setting->logo=$imageName1;
            }
              if($request->hasFile('icon')){

             $setting->icon=$imageName2;
            }
              if($request->hasFile('cover')){
             $setting->cover=$imageName3;
            } 


             
            $setting->title    = $request->title;
            $setting->desc    = $request->desc;

        
        $setting->save();
        return redirect()->route('hello')->with('status','Setting updated successfully');
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
