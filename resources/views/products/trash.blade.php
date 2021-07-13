@extends('products.layout')

@section('content')


<div class="jumbotron container">
    <p>Trashed Products</p>
    <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Home</a>
</div>

<div class="container">
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col" style="width: 400px">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ( $products as $item )
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }} EGP</td>
                    <td>

                            <div class="row">

                              <div class="col-sm">
                                <a class="btn btn-primary" href="{{route('product.back.from.trash',$item->id )}}">Restore</a>
                              </div>

                              <div class="col-sm">
                                <a class="btn btn-danger" href="{{route('product.delete.from.database',$item->id )}}">Delete</a>
                              </div>

                          </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

        {!! $products->links() !!}

    </div>


@endsection
