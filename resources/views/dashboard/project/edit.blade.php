@extends('layouts.default')

@section('contentt')

@section('title')
Edit Project

@endsection




<form method="post" action="{{ route('project.update',$project->id) }}" enctype="multipart/form-data">
  @method('PUT')
               
                @csrf
                <h3 class="box-title">Edit project</h3>

               
    
    


     @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
      @php

        $trans = $project->getTranslation($locale);
            @endphp
    <div class="form-group">
       
         <input type="text"  value="{{$trans->name  }}" name="name[{{ $locale }}]" class="form-control" id="name_{{ $locale }}" placeholder="name"><br><br>
        <label for="name_{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach

    
          <img src="{{ route('image_show', $project->image)}}" class="img-responsive"/><br><br>

     
   
  <div class="form-group">
        <input type="file"  name="image" >
        <label for="exampleInputFile">File input</label>


      </div>
      <div class="form-group">
        <input type="string" value="{{ $project->url }}" name="url" class="form-control" id="code" placeholder="url">
        <label for="code">enter url </label>

    </div>


    <div class="form-group">
        <input type="number" value="{{ $project->order }}" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


