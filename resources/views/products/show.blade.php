<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Viewing Product') }}
        </h2>
</x-slot>

<div class="container">   
    <strong>You are viewing {{@$product->title}}</strong>
    <div class="row"> 
        @foreach($product->images as $image)
                  
            <div class="col-sm-4"><img src="{{$image}}" style="max-height:220px" /></div>                           

        @endforeach
    </div>
</div>
</x-app-layout>