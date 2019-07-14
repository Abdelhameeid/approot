 @extends('layouts.default')

@section('contentt')


@section('title')
All Project

@endsection
<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>name</th>
             <th>order</th>
            
            <th>url</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($projects as $project)

        <tr>
            <td>    {{ $project->name}} </td>
            
            <td>{{ $project->order  }}</td>
            <td>{{ $project->url  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          



@permission('project-show')

            <td>  <a class="btn btn-primary"  href="{{ route('project.show',$project->id) }}"> show</a>  </td> 
@endpermission
          @permission('project-edit')
            <td> <a class="btn btn-success"  href="{{ route('project.edit',$project->id) }}"> edit</a>  </td> 
            @endpermission
@permission('project-delete')
<form action="{{ route('project.destroy',$project->id)}}" method="post">
    @method('DELETE')
  {{ csrf_field()}}
<input type="hidden" name="method" value="DELETE">
    <td>    <button type="submit" onclick="return ConfirmDelete()" class="btn btn-danger">delete</button>  </td>
</form>
@endpermission


            
<script type="text/javascript">
function ConfirmDelete() {
  return confirm("Are you sure you want to delete?");
}


    </script>

            


        </tr>
        @endforeach

    </table>
</div>
    @endsection
