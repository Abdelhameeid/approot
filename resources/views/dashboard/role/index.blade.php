@extends('layouts.default')

@section('contentt')

@section('title')
All Role

@endsection

    <h3>Roles</h3>
    @permission('role-create')
    <a class="btn btn-success" href="{{route('role.create')}}"> Create Role</a>
    @endpermission
    <table class="table table-hover table-dark">
        <tr>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
         @foreach($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->display_name}}</td>
                <td>{{$role->description}}</td>
 @permission('role-show')
                    <td>  <a class="btn btn-primary" href="{{ route('role.show',$role->id) }}"> show</a>  </td> 
@endpermission
           @permission('role-edit')
            <td>  <a class="btn btn-success" href="{{ route('role.edit',$role->id) }}"> edit</a>  </td> 
 @endpermission
 @permission('role-delete')
<form action="{{ route('role.destroy',$role->id)}}" method="post">
    @method('DELETE')
  {{ csrf_field()}}
<input type="hidden" name="method" value="DELETE">
    <td>    <button type="submit" class="btn btn-danger">delete</button>  </td>
</form>
@endpermission
  @endforeach
</tr>
  {{--

@forelse($roles as $role)
    <tr>
        <td>{{$role->name}}</td>
        <td>{{$role->display_name}}</td>
        <td>{{$role->description}}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{route('role.edit',$role->id)}}">Edit</a>
            <form action="{{route('role.destroy',$role->id)}}"  method="POST">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <input class="btn btn-sm btn-danger" onclick="return ConfirmDelete()" type="submit" value="Delete">
             </form>
        </td>
    </tr>
    @empty
    <tr>
        <td>No roles</td>
    </tr>
    @endforelse
    --}}

    </table>




@endsection

