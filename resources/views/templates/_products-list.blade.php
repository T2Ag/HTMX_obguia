@foreach ($products->get() as $prod)

    @include('templates._single-product',['prod' => $prod])

@endforeach

<div id="name_error" hx-swap-oob="true" >
</div> 

<div id="img_error" hx-swap-oob="true" >
</div>
 
<div id="price_error" hx-swap-oob="true" >
</div> 

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Product Added</h3>
    </div>
</div>



