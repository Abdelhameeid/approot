@extends('layouts.default')

@section('contentt')
@section('title')
Edit Email

@endsection





<form method="post" action="{{ route('email.update',$email->id) }}" >
  @method('PUT')
               
                @csrf
                <h3 class="box-title">Edit Email</h3>

               
    
    



    
         
     
   
  
      <div class="form-group">
        <input type="string" value="{{ $email->email }}" name="email" class="form-control" id="code" placeholder="email">
        <label for="code">enter email </label>

    </div>


    <div class="form-group">
        <input type="number" value="{{ $email->order }}" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


