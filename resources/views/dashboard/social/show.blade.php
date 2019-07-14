 @extends('layouts.default')

@section('contentt')


@section('title')
show Social

@endsection
         <h3>url</h3> {{  $social->url }}<br><br>
         <h3>order</h3> {{  $social->order }}<br><br>


     <img src="{{ route('image_show', $social->image)}}" class="img-responsive"/><br><br>
    


@endsection