 @extends('layouts.default')

@section('contentt')

@section('title')
Create Project

@endsection
        <h3>Name:</h3> {{  $project->name }}<br><br>
         <h3>url</h3> {{  $project->url }}<br><br>
         <h3>order</h3> {{  $project->order }}<br><br>


     <img src="{{ route('image_show', $project->image)}}" class="img-responsive"/><br><br>
    


@endsection