 @extends('layouts.default')

@section('contentt')
        <h3>Name:</h3> {{  $setting->title }}<br><br>
         <h3>desc</h3> {{  $setting->desc }}<br><br>

     <img src="{{ route('image_show', $setting->icon)}}" class="img-responsive"/><br><br>
          <img src="{{ route('image_show', $setting->logo)}}" class="img-responsive"/><br><br>
     <img src="{{ route('image_show', $setting->cover)}}" class="img-responsive"/><br><br>

    


@endsection