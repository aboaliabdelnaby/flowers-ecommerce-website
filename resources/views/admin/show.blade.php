{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Show All Products</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-primary" href="{{url('admin/add')}}">Add Product</a>
      
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>image</th>
    			<th>name</th>
    			<th>price</th>
    			<th>quantity</th>
    			<th>edit</th>
    			<th>delete</th>
    		</tr>
    	</thead>
    	<tbody>
    	@if(count($products)>0)
    	   @foreach($products as $product)
    	     <tr>
    	     	<td><img src="{{asset('storage/images/'.$product->image)}}" width="100px" height="100px"></td>
    	     	<td>{{$product->name}}</td>
    	     	<td>{{$product->price}} L.E</td>
    	     	<td>{{$product->quantity}}</td>
    	     	<td><a href="{{url('admin/edit',$product->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Product</a></td>
    	     	<td><a href="{{url('admin/delete',$product->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete Product</a></td>

    	     </tr>
    	   @endforeach
    	@endif	
    	</tbody>
    	
    </table>
    {{$products->links()}}
  </div>
  <!-- /.box-body -->
  
  <!-- box-footer -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop