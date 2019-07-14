 @extends('layouts.default')

@section('contentt')
@section('title')
All Subscribe 

@endsection
<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>Email</th>
            
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($subscribes as $subscribe)

        <tr>
            <td>    {{ $subscribe->email}} </td>
            

             <?php $time = date('d M, Y', strtotime($subscribe->created_at)); ?>
        <td>{{ $time }}</td>
            <td></td>
            <td></td>
            <td>

            
@permission('subscribe-delete')
<form action="{{ route('subscribe.destroy',$subscribe->id)}}" method="post">
    @method('DELETE')
  {{ csrf_field()}}
<input type="hidden" name="method" value="DELETE">
    <td>    <button type="submit"  data-id="{{ $subscribe->id }}" onclick="return ConfirmDelete()" class="btn btn-danger deleteRecord">delete</button>  </td>
</form>
@endpermission




<script type="text/javascript">
$(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "dashboard/subscribe/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
        }
    });
   
});
</script>
           




         

          
            




            


            


        </tr>
        @endforeach

    </table>
</div>
    @endsection
