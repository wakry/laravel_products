<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    @isset($searchMessage)
        <div class="alert alert-success">
            <p>{{ $searchMessage }}</p>
        </div>
    @endisset


    <!-- Serach Box -->
    <form  action="search" method="get" class="input-group mb-3 col-lg-6 offset-lg-3">
        <div class="input-group">
            <input name="q" type="text" class="form-control" placeholder="Serach for a product" aria-describedby="basic-addon2">
            <button class="button-1" type="submit">Search</button>

        </div>
    </form>

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
        @foreach ($products as $product)
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
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
      

</x-app-layout>
