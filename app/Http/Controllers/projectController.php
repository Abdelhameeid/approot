<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Project;
use Image;

use LaravelLocalization;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
         public function __constuct() {
        $this->middleware('permission:project-index')->only('index');
        $this->middleware('permission:project-create')->only(['store', 'create']);
        $this->middleware('permission:project-show')->only('show'); 
        $this->middleware('permission:project-delete')->only('destroy');
        $this->middleware('permission:project-edit')->only('edit','update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user=Auth::user();
        $projects=Project::all();
        return view('dashboard.project.index',compact('projects','user'));
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
        return view('dashboard.project.create',compact('user'));
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
         foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $this->validate($request,[
                "name.$locale" => 'required|string',
            ]);
         }

         if($request->hasFile('image')){

            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;

 $thumbnailpath = storage_path('app\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(200, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

           // $request->file('image')->storeAs('public/thumbnails',$imageName);   
            }

             $project = new Project();
             $project->order = $request->order;
             $project->url = $request->url;

             $project->image=$imageName;

              foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $project->{"name:$locale"}    = $request->name[$locale];

        }
        $project->save();
        return redirect()->route('project.index');
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
        $project=Project::find($id);
        return view('dashboard.project.show',compact('project','user'));
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
        $project=Project::find($id);
        return view('dashboard.project.edit',compact('project','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project)
    {
        
         $this->validate($request,[
            'order'=>'required',
            'image'=>'required', 
            'url'=>'required'           
          
           ]);  
         foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $this->validate($request,[
                "name.$locale" => 'required|string',
            ]);
         }

         if($request->hasFile('image')){

            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumnnail.'.$imageExt;
             $thumbnailpath = storage_path('app\\public\\'.$imageName);
        $img = Image::make($request->image)->resize(200, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
            //$request->file('image')->storeAs('public',$imageName);   
            }

             $project = Project::find($project);
             $project->order = $request->order;
             $project->url = $request->url;

             $project->image=$imageName;

              foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop) {
            $project->{"name:$locale"}    = $request->name[$locale];

        }
        $project->save();
        return redirect()->route('project.show',$project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $project=Project::find($id);
       
            $project->delete();
        return redirect()->route('project.index');
      
    }
}
