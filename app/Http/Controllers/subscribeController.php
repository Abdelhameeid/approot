<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;


class subscribeController extends Controller
{
     public function __constuct() {
        $this->middleware('permission:subscribe-index')->only('index');
        $this->middleware('permission:subscribe-delete')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $subscribes  = Subscribe::all();
        return view('dashboard.subscribe.index', compact('subscribes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subscribe)
    {
          $subscribe=Subscribe::find($subscribe);
            $subscribe->delete();
        return redirect()->route('subscribe.index')->with('status' ,'Subscribe Deleted suucssefully');;
    }
}
