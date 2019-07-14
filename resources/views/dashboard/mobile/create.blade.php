@extends('layouts.default')

@section('contentt')


@section('title')
Create Mobile

@endsection

<form method="post" action="{{ route('mobile.store') }}" >
                <h3 class="box-title">create mobile</h3>
                 @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

    {{csrf_field()}}

    


    <div class="form-group">
        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="mobile">
        <label for="code">enter mobile </label>

    </div>
    <div class="form-group">
        <input type="number" name="order" class="form-control" id="code" placeholder="order">
        <label for="code">enter order </label>

    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection


