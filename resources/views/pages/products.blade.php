@extends('templates.base')

@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl content-center">Products</h1>
        </div>
        <div class="flex items-center">
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mx-3"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="resetModal()">
                    Add
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" 
                            hx-post="/api/products"
                            hx-trigger="submit"
                            hx-target="#products_list"
                            hx-swap="innerHTML"
                            hx-on::after-request="this.reset()"

                        >
                        @csrf
                            <div class="modal-body">
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                    <div id = "name_error" hx-swap-oob="true"> </div>
                                </div>
            
                                <div class="mb-3">
                                    <label for="img" class="form-label">Image Link</label>
                                    <textarea class="form-control" id="img" name="img" ></textarea>
                                    <div id = "img_error" hx-swap-oob="true"> </div>
                                </div>
            
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" >
                                    <div id = "price_error" hx-swap-oob="true"> </div>
                                </div>
                            </div>

                            <div id="addProductMessage" hx-swap-oob="true">
                            </div>

                            <div class="modal-footer">
                                
                                <button type="submit" class="btn btn-primary" >Save</button>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" 

                                >Close</button>

                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div>
                <form hx-get="/api/products"
                        hx-trigger="submit"
                        hx-target="#products_list"
                        hx-reset="true">
                    <input type="text" name="filter" class="p-2 border border-gray-300 rounded mt-4">
                </form>
            </div>
        </div>
    </div>
    <div id="products_list" class="flex flex-wrap gap-3 justify-between mt-3" hx-get="/api/products" hx-trigger="load delay:500ms" hx-swap="innerHTML">

    </div>

    <script>
        function resetModal() {
            document.getElementById('name_error').innerHTML = '';
            document.getElementById('img_error').innerHTML = '';
            document.getElementById('price_error').innerHTML = '';
            document.getElementById('addProductMessage').innerHTML = '';
        }
    </script>


@endsection