@extends('layouts.default')

@section('contentt')




<form method="post" action="{{ route('setting.store') }}" enctype="multipart/form-data">
                <h3 class="box-title">create setting</h3>
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
     @endforeach

    {{csrf_field()}}

     @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
    <div class="form-group">
        <input type="text"  name="title[{{ $locale }}]" class="form-control" id="title_{{ $locale }}" placeholder="title">
        <label for="title_{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach
      @foreach(LaravelLocalization::getSupportedLocales() as $locale => $prop)
     <div class="form-group">
        <input type="text"  name="desc[{{ $locale }}]" class="form-control" id="desc{{ $locale }}" placeholder="desc">
       <label for="desc{{ $locale }}"> {{ $prop['native'] }}</label>

    </div>
     @endforeach
   
  <div class="form-group">
        <input type="file"  name="Logo" >
        <label for="exampleInputFile">Logo File </label>
   </div>
    <div class="form-group">
        <input type="file"  name="icon" >
        <label for="exampleInputFile">icon File </label>
   </div>
    <div class="form-group">
        <input type="file"  name="cover" >
        <label for="exampleInputFile">cover File </label>
   </div>


    <div class="form-group">
        <input type="number" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


