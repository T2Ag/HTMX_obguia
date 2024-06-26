@foreach ($products->get() as $prod)

    <div class='p-4 rounded overflow-hidden shadow-md bg-white mt-3'>
        <img src='{{$prod->img}}' alt='{{$prod->name}}' class='w-full h-48 object-cover rounded-t'>
        <h3 class='text-2xl'>{{$prod->name}}</h3>
        <p class='text-lg'>{{$prod->price}}</p>
    </div>

@endforeach

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Product Added</h3>
    </div>
</div>



