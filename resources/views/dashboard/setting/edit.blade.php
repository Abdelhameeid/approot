@extends('layouts.default')

@section('contentt')



@section('title')
edit Setting

@endsection

<form method="post" action="{{ route('setting.update',$setting->id) }}" enctype="multipart/form-data">

@method('PUT')
                <h3 class="box-title">Edit setting</h3>
                @csrf

               
    
    


    
    <div class="form-group">
       
         <input type="text"  value="{{$setting->title  }}" name="title" class="form-control" id="title_{{ $locale }}" placeholder="title">
        <label for="title">name: </label>

    </div>

     
    <div class="form-group">
       
         <input type="text"  value="{{$setting->desc  }}" name="desc" class="form-control" id="desc" placeholder="desc">
        <label for="desc">desc:</label>

    </div>

   <img src="{{ route('image_show', $setting->icon)}}" width="20%" height="10%" class="img-responsive"/>
   <div class="form-group">
        <input type="file"  name="icon" >
        <label for="exampleInputFile"> logo File </label>
   </div>
{{--
    <img src="{{ route('image_show', $setting->logo)}}"  width="20%" height="10%" class="img-responsive"/>
   <div class="form-group">
        <input type="file"  name="logo" >
        <label for="exampleInputFile">icon File </label>
   </div>
   --}}

    <img src="{{ route('image_show', $setting->cover)}}"  width="20%" height="10%" class="img-responsive"/>
   <div class="form-group">
        <input type="file"  name="cover" >
        <label for="exampleInputFile">cover File </label>
   </div>


   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


