@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       @if(count($products)>0)
          @foreach($products as $product)
            @if($product->quantity>0)
              <div class="col-md-3 mr">
                 <div class="card">
                      <img class="card-img-top" src="{{url('storage/images/'.$product->image)}}" alt="Card image">
                      <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text">{{$product->price}} L.E</p>
                        <form action="{{url('add')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <input type="submit" class="btn btn-primary" value="Add To Cart">
                        </form>
                        
                      </div>
                    </div>
              </div>
            @endif
          @endforeach
        @endif
    </div>
    {{$products->links()}}
</div>
@endsection
