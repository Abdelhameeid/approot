 @extends('layouts.default')

@section('contentt')

@section('title')
show Service

@endsection
        <h3>Name:</h3> {{  $service->name }}<br><br>
         <h3>desc</h3> {{  $service->desc }}<br><br>

     <img src="{{ route('image_show', $service->image)}}" class="img-responsive"/><br><br>
    


@endsection