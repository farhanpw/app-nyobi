@extends('layout.main')

@section('title', 'Products')

@section('container')

    <h1 class="text-center fw-bolder mx-auto py-5">Our Products</h1>
    <!-- search bar-->
    <input type="text" class="form-control mt-1 mx-auto" id="search" name="search" placeholder="Search..."style="width: 30%;  border: 4px solid black; border-radius: 25px;">
    <!-- end search bar-->
<br>

        {{-- <div id="search_list"></div> --}}

        <!-- Section-->
        <section class="py-5">
        <!-- hidden message -->
        <h3 class="text-center text-danger mt-5" id="para" style="display: none;">Not Found</h3>
        <!--- end hidden message -->
        <div class="container px-4 px-lg-5 mt-5">
            <div id="search_list">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="/uploads/{{ $product->image }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h3 class="product-title" style="text-decoration: none">
                                            <a href="/product/{{ $product->id }}"
                                                style="text-decoration: none; color:black">{{ $product->product_name }}</a>
                                        </h3>
                                        <!-- Product price-->
                                        <span class="price">
                                            <ins>
                                                <span class="amount" style="text-decoration: none; color:black">Rp.
                                                    {{ number_format($product->price) }}</span>
                                            </ins>
                                        </span>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Buy <i
                                                class="bi bi-bag"></i> </a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                    
                </div>
            </div>

            <div class="d-flex justify-content-end">
                {{ $products->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
        <!-- Endsection-->
    @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function() {
                $('#search').on('keyup', function() {
                    var query = $(this).val();
                    $.ajax({
                        url: "action",
                        type: "GET",
                        data: {
                            'search': query
                        },
                        success: function(data) {
                            console.log(data)
                            $('#search_list').html(data);
                        }
                    });
                    //end of ajax call
                });
            });
        </script>
    @endpush
