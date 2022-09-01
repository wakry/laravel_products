<x-app-layout>
    @foreach($categories as $category)
    <h1 class="display-1 text-center">{{$category->title}}</h1>
    <table>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($category->getProducts as $product)
        <tr>

            <td><img src="{{$product->thumbnail}}"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description}}</td>
            <td>${{number_format($product->price, 2, ',', '.') }}</td>
            <td>{{ $product->discountPercentage}}</td>
            <td>{{ $product->rating}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->brand}}</td>
            <td>{{ $product->category}}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <table>
    @endforeach
</x-app-layout>

