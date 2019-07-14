@extends('layouts.default')

@section('contentt')

@section('title')
Edit Social

@endsection


<form method="post" action="{{ route('social.update',$social->id) }}" enctype="multipart/form-data">
  @method('PUT')
               
                @csrf
                <h3 class="box-title">Edit social</h3>

               
    
    


     

    
         
      <div class="form-group">
        <input type="string" value="{{ $social->url }}" name="url" class="form-control" id="code" placeholder="url">
        <label for="code">enter url </label>

    </div>


    <div class="form-group">
        <input type="number" value="{{ $social->order }}" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
     <img src="{{ route('image_show', $social->image)}}" class="img-responsive"/><br><br>

     
   
  <div class="form-group">
        <input type="file"  name="image" >
        <label for="exampleInputFile">File input</label>


      </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


