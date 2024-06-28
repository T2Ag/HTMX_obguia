@extends('templates.base')
@section('content')
    <div class="mt-4 w-full flex justify-center" id="EditPage">
        <div class="w-[50vh] bg-white rounded shadow-md p-3 mt-10">
               <div>
                  <img src="{{$product->img}}" alt="" class="flex justify-center w-full h-48 object-cover rounded-t">
               </div>
                <div class="mb-2">
                    <label for="name" class="text-xl">Name:</label>
                    <div class="">
                        {{ $product->name}}
                    </div>
                </div>
                <div class="mb-2">
                    <label for="price" class="text-xl">Price:</label>
                    <div>
                        {{ $product->price}}
                    </div>
                </div>
                <footer class="flex items-center py-4">
                    <div>
                        <a href="/products" class="bg-green-600 rounded text-white px-3 py-2.5">Back</a>
                    </div>
                </footer>
        </div>
    </div>
@endsection