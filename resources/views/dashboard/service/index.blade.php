 @extends('layouts.default')
@section('title', 'All services')
@section('contentt')
<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>name</th>
            
            <th>desc</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($services as $service)

        <tr>
            <td>    {{ $service->name}} </td>
            

            <td>{{ $service->desc  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           


@permission('service-show')

            <td>  <a class="btn btn-primary"  href="{{ route('service_show',$service->id) }}"> show</a>  </td> 
@endpermission
      @permission('service-edit')    
            <td>  <a class="btn btn-success"  href="{{ route('service_edit',$service->id) }}"> edit</a>  </td> 
            @endpermission
@permission('service-delete')
<form action="{{ route('service_delete',$service->id)}}" method="post">
  {{ csrf_field()}}
<input type="hidden" name="method" value="DELETE">
    <td>    <button type="submit" onclick="return ConfirmDelete()" class="btn btn-danger">delete</button>  </td>
</form>
@endpermission


            


            


        </tr>
        @endforeach

    </table>
</div>
    @endsection
