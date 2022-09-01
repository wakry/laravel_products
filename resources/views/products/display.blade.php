
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('search') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @foreach ($products as $product)

    <div class="row">
  <div class="column">
  <div class="card">
        <img src="{{$product->thumbnail}}" alt="Denim Jeans" style="width:10%">
        <h1>{{ $product->title }}</h1>
        <p class="price">{{$product->price}}</p>
        <p>{{$product->discription}}</p>
        <p><button>Add to Cart</button></p>
    </div>
  </div>
</div>
    @endforeach
    {!! $products->links() !!}
      

</x-app-layout>
