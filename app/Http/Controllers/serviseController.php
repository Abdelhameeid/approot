<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Storage;
use Image;

use LaravelLocalization;
use Illuminate\Support\Facades\Auth;


class serviseController extends Controller
{
           public function __constuct() {
        $this->middleware('permission:service-index')->only('index');
        $this->middleware('permission:service-create')->only(['store', 'create']);
        $this->middleware('permission:service-show')->only('show'); 
        $this->middleware('permission:service-delete')->only('destroy');
        $this->middleware('permission:service-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $user=Auth::user();
         $services  = Service::all();
        return view('dashboard.service.index', compact('services','user'));
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
        return view('dashboard.service.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
         $this->validate($request,[
            'order'=>'required',
            'image'=>'required'           
           ]);  
         foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $this->validate($request,[
                "name.$locale" => 'required|string',
                "desc.$locale" => 'required|string',
            ]);
         }

         if($request->hasFile('image')){

            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;
$thumbnailpath = storage_path('app\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(64, 64, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);            
            }

             $service = new Service;
             $service->order = $request->order;
             $service->image=$imageName;

              foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $service->{"name:$locale"}    = $request->name[$locale];
            $service->{"desc:$locale"}    = $request->desc[$locale];

        }
        $service->save();
        return redirect()->route('service_index');
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
        $service=Service::find($id);
        return view('dashboard.service.show',compact('service','user'));
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
        $service=Service::find($id);
        return view('dashboard.service.edit',compact('service','user'));
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
        
         if($request->hasFile('image')){
            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;
$thumbnailpath = storage_path('app\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(64, 64, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

            }

            $service=Service::find($id);

            $service->order = $request->order;
             $service->image=$imageName;

              foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $service->{"name:$locale"}    = $request->name[$locale];
            $service->{"desc:$locale"}    = $request->desc[$locale];

        }
        $service->save();
        return redirect()->route('service_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        
            $service->delete();
        return redirect()->route('service_index');
       
    }
}
