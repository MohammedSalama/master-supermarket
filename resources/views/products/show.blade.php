@extends('products.layout')

@section('content')

<div class="container" style="padding-top: 12%">
    <div class="card" >
        <div class="card-body">
            <p class="card-text"> <span><a href="{{route('products.index')}}" class="btn btn-secondary btn-lg active">Back</a></span> product name : {{ $product->name}} </p>
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



        <div class="form-group">
          <label for="exampleFormControlInput1">{{ $product->name}}</label>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">{{ $product->price}} EGP</label>
          </div>


        <div class="form-group">
                {!! $product->detail !!}
          </div>

</div>


@endsection
