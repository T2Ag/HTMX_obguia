@foreach ($products->get() as $prod)

    <div class='p-4 rounded overflow-hidden justify-between shadow-md bg-white mt-3'>
        <img src='{{$prod->img}}' alt='{{$prod->name}}' class='w-full h-48 object-cover rounded-t'>
        <h3 class='text-2xl'>{{$prod->name}}</h3>
        <p class='text-lg'>{{$prod->price}}</p> 
        <div>
            <button
                    hx-confirm="Are you sure you want to delete this product?" 
                    hx-delete="/api/product/{{$prod->id}}" 
                    hx-swap="delete" 
                    hx-target="this"
                    hx-on="htmx:afterRequest: window.location.reload()">
                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6 text-red-500'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0' />
                    </svg>      
                
            </button>

            <button hx-get='/product/{{$prod->id}}/show'
                hx-target="body"
                hx-swap="innerHTML"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill='none'  stroke-width='20' stroke='currentColor' class='size-6 text-black-500'><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
            </button>

            <button hx-get='/product/{{$prod->id}}/edit'
                hx-target="body"
                hx-swap="innerHTML"
            >
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6 text-blue-500'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10' />
                </svg>         
            </button>
        </div>
        
    </div>

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



