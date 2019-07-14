 @extends('layouts.default')

@section('contentt')
@section('title')
All Social

@endsection
<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>url</th>
            
            <th>order</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($socials as $social)

        <tr>
            <td>    {{ $social->url}} </td>
            

            <td>{{ $social->order  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           



@permission('social-show')

            <td>  <a class="btn btn-primary" href="{{ route('social.show',$social->id) }}"> show</a>  </td> 
            @endpermission

            @permission('social-edit')


            <td>  <a class="btn btn-success" href="{{ route('social.edit',$social->id) }}"> edit</a>  </td> 
@endpermission
            @permission('social-delete')


<form action="{{ route('social.destroy',$social->id)}}" method="post">
  {{ csrf_field()}}
   @method('DELETE')
    <td>    <button type="submit" onclick="return ConfirmDelete()" class="btn btn-danger">delete</button>  </td>
</form>
@endpermission


            


            


        </tr>
        @endforeach

    </table>
</div>
    @endsection
