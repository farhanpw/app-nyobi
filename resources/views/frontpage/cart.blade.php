@extends('layout.main')

@section('title', 'cart')

@section('container')

    <section class="h-100 gradient-custom">
        <div class="container px-2 my-5">

            <div class="text-center mb-5">
                <h1 class="fw-bolder">Cart</h1>
                <p class="lead fw-normal text-muted mb-0">Checkout Here!</p>
            </div>

            <form class="form-cart">
                <input type="hidden" name="member_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="grand_total" class="grand_total" value="{{ ($cart_total) }}">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">{{ $total_item }} Product ittems</h5>
                            </div>
                            <div class="card-body">

                                <!-- cart item -->
                                <div class="row">
                                    <div class="col-lg col-md-12 mb-4 mb-lg-0">
                                        <div class="table-responsive table-wrap mb-30">
                                            <table class="table ">
                                                <thead>
                                                    <tr c>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($carts as $cart)
                                                        <input type="hidden" name="product_id[]" value="{{ $cart->product->id }}">
                                                        <input type="hidden" name="amount[]" value="{{ $cart->amount }}">
                                                        <input type="hidden" name="total[]" value="{{ $cart->total }}">
                                                        <tr class="cart_item text-center" style="vertical-align: middle;">
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="product-thumbnail">
                                                                        <a href="#">
                                                                            <img style="width: 100px; height:100px;"
                                                                                src="/uploads/{{ $cart->product->image }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-info">
                                                                        <ul class="list-unstyled">
                                                                            <li><strong>{{ $cart->product->product_name }}</strong>
                                                                            </li>
                                                                            <li>{{ $cart->product->variant->name }}</li>
                                                                            <li>{{ $cart->product->size->name }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                {{ 'Rp. ' . number_format($cart->product->price) }}</td>
                                                            <td class="text-center">
                                                                <div class="d-flex mb-4"
                                                                    style="max-width: 150px;  border-radius: 5px; overflow: hidden;">
                                                                    <button class="btn  px-3 "
                                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                    <div class="form-outline">
                                                                        <input id="amount" min="0" name="quantity"
                                                                            value="{{ $cart->amount }}" type="number"
                                                                            class="form-control" />
                                                                    </div>
                                                                    <button class="btn  px-3"
                                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                {{ 'Rp. ' . number_format($cart->total) }}
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="/delete_from_cart/{{ $cart->id }}"
                                                                    class="remove" title="Remove this item"
                                                                    style="color: black;"
                                                                    onmousedown="this.style.backgroundColor='red';"
                                                                    onmouseup="this.style.backgroundColor='';">
                                                                    <i class="bi bi-x-lg"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- cart item -->
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 ">
                                        Subtotal
                                        <span class="amount cart-total">{{ 'Rp. ' . number_format($cart_total) }}</span>
                                    </li>
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span class="shipping-cost">Calculated after checkout</span>
                                </li> --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total</strong>
                                            {{-- <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong> --}}
                                        </div>
                                        <span class="amount"><strong>{{ 'Rp. ' . number_format($cart_total) }}</strong></span>
                                    </li>
                                    <small>shipping calculated at checkout</small>
                                </ul>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-success checkout"><span>proceed to checkout</span></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection

@push('css')
    <style>
        .remove {
            color: black;
        }

        .remove:active {
            background-color: red;
            background-color: transparent;
            border: 1px solid black;
            border-radius: 20px;
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
    </style>
@endpush


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.checkout', function(e) {
                // console.log('test');
                e.preventDefault()
                $.ajax({
                    url: '/checkout_orders',
                    method: 'POST',
                    data: $('.form-cart').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function() {
                        location.href = '/checkout'
                    }
                })
            })
        });
    </script>
@endpush
