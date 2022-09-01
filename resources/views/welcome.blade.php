
@extends('cart-layout')
@section('content')

    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="min-height:100px;">
            <strong> This website is created for demo purposes by Muhannad Alghamdi</strong>
    <div class="container">

    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>price</th>
            <th>discountPercentage</th>
            <th>rating</th>
            <th>stock</th>
            <th>brand</th>
            <th>category</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>

            <td><img src="{{$product->thumbnail}}" style="max-height:100px;"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description}}</td>
            <td>${{number_format($product->price, 2, ',', '.') }}</td>
            <td>{{ $product->discountPercentage}}</td>
            <td>{{ $product->rating}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->brand}}</td>
            <td>{{ $product->category}}</td>
            <td> <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary" role="button">Add to cart</a> </p></td>
        </tr>
        @endforeach
    </table>
    {!! $products->links('pagination::bootstrap-4')!!}

@endsection
