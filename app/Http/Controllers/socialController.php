<?php

namespace App\Http\Controllers;
use App\Social;
use Image;
use Storage;



use Illuminate\Http\Request;

class socialController extends Controller
{
       public function __constuct() {
        $this->middleware('permission:social-index')->only('index');
        $this->middleware('permission:social-create')->only(['store', 'create']);
        $this->middleware('permission:social-show')->only('show'); 
        $this->middleware('permission:social-delete')->only('destroy');
        $this->middleware('permission:social-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $socials  = Social::all();
        return view('dashboard.social.index', compact('socials'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.social.create');
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
            'order'=>'required',
            'image'=>'required', 
            'url'=>'required'           
        
           ]);  
          if($request->hasFile('image')){

            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;
$thumbnailpath = storage_path('app\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(50, 50, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

            }

             $social = new Social;
             $social->order = $request->order;
             $social->url = $request->url;

             $social->image=$imageName;
             $social->save();
             return redirect()->route('social.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social=Social::find($id);
        return view('dashboard.social.show',compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $social=Social::find($id);
        return view('dashboard.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $social)
    {
          $this->validate($request,[
            'order'=>'required',
            'image'=>'required', 
            'url'=>'required'           
          
           ]);  
           if($request->hasFile('image')){

            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;
             $thumbnailpath = storage_path('ap\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(50, 50, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
            //$request->file('image')->storeAs('public',$imageName);   
            }

             $social = Social::find($social);
             $social->order = $request->order;
             $social->url = $request->url;

             $social->image=$imageName;
              $social->save();
        return redirect()->route('social.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $social=Social::find($id);
       
            $social->delete();
        return redirect()->route('social.index');
       
    }
}
