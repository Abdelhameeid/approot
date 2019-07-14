 @extends('layouts.default')

@section('contentt')
@section('title')
All Email

@endsection

<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>Email</th>
            
            <th>order</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($emails as $email)

        <tr>
            <td>    {{ $email->email}} </td>
            

            <td>{{ $email->order  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           



@permission('email-show')
          <td> <a class="btn btn-primary" href="{{ route('email.show',$email->id) }}">show</a> </td>
          @endpermission
@permission('email-edit')
          <td> <a class="btn btn-success" href="{{ route('email.edit',$email->id) }}">Edit</a> </td>
          @endpermission
            
@permission('email-delete')
<form action="{{ route('email.destroy',$email->id)}}" method="post">
    @method('DELETE')
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
