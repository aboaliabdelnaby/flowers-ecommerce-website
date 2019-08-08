@extends('layouts.app')

@section('content')
   <!-- /.box-body -->
  <div class="container">
    <h2>Show Cart of {{$user->name}}</h2>
    <div class="table-responsive">
      
   
         <table class="table table-bordered" style="background-color: white">
      <thead>
        <tr>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          <th>quantity</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
         @if(count($user->products)>0)
         <?php $total=0;?>
         @foreach($user->products as $product)
             <tr>
              <td><img src="{{url('storage/images/'.$product->image)}}" width="100px" height="100px"></td>
              <td>{{$product->name}}</td>
              <td>{{$product->pivot->price}} L.E</td>

              <?php $total+=$product->pivot->price ;?>

              <td>{{$product->pivot->quantity}}</td>
              <td>
                <form action="{{url('delete')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="quantity" value="{{$product->pivot->quantity}}">
                            <input type="submit" class="btn btn-danger" value="Delete From Cart">
                </form>
             </tr>
             
         @endforeach
         <tr style="font-size: 20px">
               <td>total price</td>
               <td colspan="4">{{$total}} L.E</td>
             </tr>
      @endif  
      </tbody>
      
    </table>
  </div>
  <!-- box-footer -->
</div>
@endsection
