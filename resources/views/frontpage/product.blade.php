@extends('layout.main')

@section('title', 'Product')

@section('container')
    <div class="container px-2 my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bolder">Detail Product</h1>
            <p class="lead fw-normal text-muted mb-0">Add to cart here!</p>
        </div>
    </div>

    <div class="container pb-5 mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="/uploads/{{ $product->image }}" alt="Card image cap" id="main-image">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox" width="40">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/{{ $product->image }}" alt="Product Image 1">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/{{ $product->image }}" alt="Product Image 2">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/{{ $product->image }}" alt="Product Image 3">

                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengori.png" alt="Product Image 4">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengpedas.png" alt="Product Image 5">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengxpedas.png" alt="Product Image 6">

                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengxpedas.png" alt="Product Image 7">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengpedas.png" alt="Product Image 8">

                                    </div>
                                    <div class="col-4">

                                        <img onclick="change_image(this)" class="card-img img-fluid"
                                            src="/uploads/basrengxpedas.png" alt="Product Image 9">

                                    </div>
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body ">
                        <h1 class="h2 text-center">{{ $product->product_name }}</h1>
                        <hr>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Harga :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted" style="text-decoration:none;"><strong>Rp.
                                        {{ number_format($product->price) }}</strong></p>
                            </li>
                        </ul>

                        <h6>Deskripsi:</h6>
                        <p class="short-description">{{ $product->description }}</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Rasa :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted" style="text-decoration:none;">
                                    <strong>{{ $product->variant->name }}</strong>
                                </p>
                            </li>
                        </ul>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Ukuran :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted" style="text-decoration:none;">
                                    <strong>{{ $product->size->name }}</strong>
                                </p>
                            </li>
                        </ul>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Bahan :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted" style="text-decoration:none;">
                                    <strong>{{ $product->material }}</strong>
                                </p>
                            </li>
                        </ul>
                        <div class="product-actions">


                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Banyaknya :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <!-- Quantity -->
                                    <div class="d-flex mb-4">
                                        <button class="btn" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="bi bi-dash"></i>
                                        </button>

                                        <div class="form-outline">
                                            <input id="form1" min="1" name="quantity" value="1" type="number" class="form-control jumlah" />
                                        </div>

                                        <button class="btn" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="bi bi-plus"></i>
                                        </button>

                                    </div>
                                    <!-- Quantity -->
                                </li>
                            </ul>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark add-to-cart"><span>Add to Carts</span></button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        /* Gaya umum untuk tombol */
        button {
            padding: 8px 12px;
            /* Atur padding untuk memberikan ruang di dalam tombol */
            font-size: 14px;
            /* Atur ukuran font */
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f0f0f0;
            color: #333;
            cursor: pointer;
        }

        button.small {
            width: 40px;
            /* Atur lebar tombol */
            height: 40px;
            /* Atur tinggi tombol */
            font-size: 12px;
            /* Atur ukuran font */
        }

        /* Gaya umum untuk input */
        input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Gaya khusus untuk input dengan tipe number */
        input[type="number"] {
            /* Atur lebar agar input tidak terlalu sempit */
            width: 40px;
        }

        /* Gaya tambahan untuk browser tertentu yang menambahkan tombol panah */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Gaya khusus untuk Firefox yang menambahkan kotak input */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function change_image(image) {

            var container = document.getElementById("main-image");

            container.src = image.src;
        }

        $(document).ready(function() {
        $(document).on('click', '.add-to-cart', function(e) {
             var product_id = {{ $product->id }}
             var amount = $('.jumlah').val()
             var total = {{ $product->price }} * amount
             var is_checkout = 0
            var csrf_token = "{{ csrf_token() }}"

             $.ajax({
                    url: '/add_to_cart',
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrf_token,
                    },
                    data: {
                        product_id,
                        amount,
                        total,
                        is_checkout,
                    },
                    success: function(data) {
                        console.log(data)
                        window.location.href = '/cart'
                    },
                    error : function(data){
                        window.location.href = '/login'

                    }
                });
        });
    });
    </script>
@endpush
