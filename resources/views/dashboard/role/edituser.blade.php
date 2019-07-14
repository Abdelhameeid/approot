@extends('layouts.default')

@section('contentt')
    <h3>Edit User</h3>

    <form action="{{route('user.update',$user->id)}}" method="post" role="form">
		{{method_field('PATCH')}}
		{{csrf_field()}}

    	<div class="form-group">
    		<label for="name">Name of user</label>
    		<input type="text" class="form-control" name="name" id="" placeholder="Name of user" value="{{$user->name}}">
    	</div>

        <div class="form-group">
            <label for="name">Email of user</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Email of user" value="{{$user->email}}">
        </div>
       
      

          <div class="form-group text-left">
            <h3>Roles</h3>
            @foreach($roles as $role)
            <input type="checkbox" {{in_array($role->id,$role_user)?"checked":""}}   name="role[]" value="{{$role->id}}" > {{$role->name}} <br>
            @endforeach
        </div>






    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endsection


