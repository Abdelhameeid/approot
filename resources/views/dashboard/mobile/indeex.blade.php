 @extends('layouts.default')

@section('contentt')
 
        
<div class="table-responsive">
   
 <table class="table table-hover table-dark" >
        <tr>
            <th>Mobile</th>
            
            <th>order</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($mobiles as $mobile)

        <tr>
            <td>    {{ $mobile->mobile}} </td>
            

            <td>{{ $mobile->order  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           




         

          @permission('mobile-show')
             <td> <a class="btn btn-primary" href="{{ route('mobile.show',$mobile->id) }}">show</a> </td>
@endpermission
@permission('mobile-edit')
          <td> <a class="btn btn-success" href="{{ route('mobile.edit',$mobile->id) }}">Edit</a> </td>

@endpermission
@permission('mobile-delete')
<form method="post" action="{{ route('mobile.destroy',$mobile->id) }}">
  @method('DELETE')
  {{ csrf_field()}}
    <td>    <button type="submit"  onclick="return ConfirmDelete()" class="btn btn-danger ">delete</button>  </td>
</form>
@endpermission





            


        </tr>
        @endforeach

    </table>
     <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script type="text/javascript">
        
            $('.submit').click(function(e){
                 var id =  jQuery('#name').val();
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                     // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
              });
               $.ajax({
                  url: "/mobile/destroy/"+ id,
                  method: 'DELETE',
                  data: {

                    "id":id,                    
                  },
                  success: function(){
                     console.log("it Works");
                  }});
               });
          
      </script>
</div>
    @endsection
