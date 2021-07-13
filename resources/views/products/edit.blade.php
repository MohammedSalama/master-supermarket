@extends('products.layout')

@section('content')

<div class="container" style="padding-top: 12%">
    <div class="card" >
        <div class="card-body">
            <p class="card-text"><span><a href="{{route('products.index')}}" class="btn btn-secondary btn-lg active">Back</a></span> product name : {{ $product->name}} </p>
        </div>
    </div>

</div>

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif

</div>



<div class="container" style="padding-top: 2%">

    <form action="{{ route('products.update',$product->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" value="{{ $product->name}}" class="form-control" placeholder="Product Name">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" name="price" value="{{ $product->price}} EGP" class="form-control" placeholder="Product Price">
          </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Details</label>
            <textarea class="form-control" name="detail" rows="3">
                {!! $product->detail !!}
            </textarea>
          </div>

          <div class="form-group">

            <button type="submit" name="submit" class="btn btn-primary">Edit</button>

        </div>

    </form>



</div>


@endsection
