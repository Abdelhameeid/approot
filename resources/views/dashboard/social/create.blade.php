@extends('layouts.default')

@section('contentt')


@section('title')
Create Social

@endsection

<form method="post" action="{{ route('social.store') }}" enctype="multipart/form-data">
    @csrf
                <h3 class="box-title">create social</h3>
                 @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

   
 <div class="form-group">
        <input type="string" name="url" class="form-control" id="code" placeholder="url">
        <label for="code">enter url </label>

    </div>
   
   
  <div class="form-group">
        <input type="file"  name="image" >
        <label for="exampleInputFile">File input</label>


      </div>


    <div class="form-group">
        <input type="number" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


