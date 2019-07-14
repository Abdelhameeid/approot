 @extends('layouts.default')

@section('contentt')
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<div class="table-responsive">

 <table class="table table-hover table-dark" >
        <tr>
            <th>title</th>
            
            <th>desc</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>


        </tr>
        @foreach($settings as $setting)

        <tr>
            <td>    {{ $setting->title}} </td>
            

            <td>{{ $setting->desc  }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>




            <td> <button > <a href="{{ route('setting.show',$setting->id) }}"> show</a>  </button></td> 

          
            <td> <button > <a href="{{ route('setting.edit',$setting->id) }}"> edit</a>  </button></td> 

<form action="{{ route('setting.destroy',$setting->id)}}" method="post">
  {{ csrf_field()}}
<input type="hidden" name="method" value="DELETE">
    <td>    <button type="submit" class="btn btn-danger">delete</button>  </td>
</form>


            


            


        </tr>
        @endforeach


    </table>
</div>
    @endsection
