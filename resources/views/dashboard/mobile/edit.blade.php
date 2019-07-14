@extends('layouts.default')

@section('contentt')



@section('title')
Edit Mobile

@endsection

<form method="post" action="{{ route('mobile.update',$mobile->id) }}" >
  @method('PUT')
               
                @csrf
                <h3 class="box-title">Edit mobile</h3>

               
    
    



    
         
     
   
  
      <div class="form-group">
        <input type="string" value="{{ $mobile->mobile }}" name="mobile" class="form-control" id="code" placeholder="mobile">
        <label for="code">enter mobile </label>

    </div>


    <div class="form-group">
        <input type="number" value="{{ $mobile->order }}" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


