
   @extends('layouts.default')

@section('contentt')

    <h3>Users</h3>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{$role->name}}
                    @endforeach

                </td>

                <td>
 @permission('user-edit')

                    <a class="btn btn-primary " href="{{ route('user.edit',$user->id) }}"> Edit </a>
                     @endpermission

                    <!-- Button trigger modal -->
                   {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal-{{$user->id}}">
                        Edit
                    </button> --}}

                    <!-- Modal -->
                    <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">{{$user->name}} Role edit</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user.update',$user->id)}}" method="post" role="form" id="role-form-{{$user->id}}">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="form-group">

                                            <select name="roles[]" multiple>
                                                @foreach($allRoles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="$('#role-form-{{$user->id}}').submit()">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <td>no users</td>
        @endforelse
    </table>


    @endsection



