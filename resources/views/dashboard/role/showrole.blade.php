 @extends('layouts.default')

@section('contentt')


@section('title')
show Role

@endsection
        <h3>Name:</h3> {{  $role->name }}<br>
         <h3>desplay_name</h3> {{  $role->display_name }}<br>
          <h3>description</h3> {{  $role->description }}<br>
          <h2>Permissions</h2>

          @foreach($role->permissions()->get() as $permission)
          <p>{{ $permission->name }}   
          </p>
          @endforeach

@endsection