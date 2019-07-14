@extends('layouts.default')

@section('contentt')


@section('title')
Edit Service

@endsection


<form method="post" action="{{ route('service_update',$service->id) }}" enctype="multipart/form-data">
                <h3 class="box-title">create service</h3>
                {{csrf_field()}}

               
    
    


     @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
      @php

        $trans = $service->getTranslation($locale);
            @endphp
    <div class="form-group">
       
         <input type="text"  value="{{$trans->name  }}" name="name[{{ $locale }}]" class="form-control" id="name_{{ $locale }}" placeholder="name"><br><br>
        <label for="name_{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach

      @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
      @php

        $trans = $service->getTranslation($locale);
            @endphp
    <div class="form-group">
       
         <input type="text"  value="{{$trans->desc  }}" name="desc[{{ $locale }}]" class="form-control" id="desc_{{ $locale }}" placeholder="desc"><br><br>
        <label for="desc_{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach
          <img src="{{ route('image_show', $service->image)}}" class="img-responsive"/><br><br>

     
   
  <div class="form-group">
        <input type="file"  name="image" >
        <label for="exampleInputFile">File input</label>


      </div>


    <div class="form-group">
        <input type="number" value="{{ $service->order }}" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


