@extends('layouts.default')

@section('contentt')


@section('title')
Create Project

@endsection


<form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                <h3 class="box-title">create project</h3>
                 @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

    {{csrf_field()}}

     @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
    <div class="form-group">
        <input type="text"  name="name[{{ $locale }}]" class="form-control" id="name_{{ $locale }}" placeholder="name">
        <label for="name_{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach
     
   
  <div class="form-group">
        <input type="file"  name="image" >
        <label for="exampleInputFile">File input</label>


      </div>


    <div class="form-group">
        <input type="number" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
     <div class="form-group">
        <input type="string" name="url" class="form-control" id="url" placeholder="url">
        <label for="code">enter url </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


