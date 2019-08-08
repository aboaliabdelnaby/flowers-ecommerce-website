{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')



@if(session('msg'))
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss='alert' aria-hidden='true' >&times;</button>
    {{session('msg')}}

</div>
@endif
@if(count($errors)>0)
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss='alert' aria-hidden='true' >&times;</button>
  <strong>Errors</strong>
  
    @foreach($errors->all() as $err)
       <li>{{$err}}</li>
    @endforeach
  
</div>
@endif
   
    <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Add  New Product</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a class="btn btn-primary" href="{{url('admin')}}">Show All Products</a>
      
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
   
    <form method="post" action="{{url('admin/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group"> 
        <input type="text" name="name" id="name" class="form-control" placeholder="enter product name" value="{{old('name')}}">
      </div>
      <div class="form-group"> 
        <label for="image">upload product image</label><input type="file" name="image" id="image" value="{{old('image')}}">
      </div>
      <div class="form-group"> 
        <input type="text" name="price" id="price" class="form-control" placeholder="enter product price" value="{{old('price')}}">
      </div>
      <div class="form-group"> 
        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="enter product quantity" value="{{old('quantity')}}">
      </div>
      <div class="form-group"> 
        <input type="submit" name="add" id="add" class="btn btn-primary btn-block" value="Add Product">
      </div>

    </form>
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