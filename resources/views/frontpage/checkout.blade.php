@extends('layout.main')

@section('container')
    <section class="h-100 gradient-custom">
        <div class="container px-2 my-5">

            <div class="text-center mb-5">
                <h1 class="fw-bolder">Cart</h1>
                <p class="lead fw-normal text-muted mb-0">Checkout Here!</p>
            </div>


            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Billing details</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example1" class="form-control" />
                                            <label class="form-label" for="form7Example1">First name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example2" class="form-control" />
                                            <label class="form-label" for="form7Example2">Last name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="number" id="form7Example6" class="form-control" />
                                    <label class="form-label" for="form7Example6">Phone</label>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label for="provinsi">Provinsi</label>
                                            <select name="provinsi" id="provinsi"
                                                class="form-control country_to_state provinsi" rel="calc_shipping_state">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($provinsi->rajaongkir->results as $provinsi)
                                                    <option value="{{ $provinsi->province_id }}">{{ $provinsi->province }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label for="kota">Kota/Kabupaten</label>
                                            <select name="kota" id="kota" class="form-control country_to_state kota"
                                                rel="calc_shipping_state">
                                                <option value="">Pilih Kota / Kab</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" id="form7Example4" class="form-control" />
                                    <label class="form-label" for="form7Example4">Address</label>
                                </div>


                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="form7Example7" rows="4"></textarea>
                                    <label class="form-label" for="form7Example7">Order notes</label>
                                </div>


                                <div class="form-check d-flex justify-content-center mb-2">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form7Example8"
                                        checked />
                                    <label class="form-check-label" for="form7Example8">
                                        Create an account?
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 ">
                                    Subtotal
                                    <span class="amount cart-total">{{ 'Rp. ' . number_format($orders->Subtotal) }}</span>
                                </li>
                                {{-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span class="shipping-cost">Calculated after checkout</span>
                                </li> --}}
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total</strong>
                                        {{-- <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong> --}}
                                    </div>
                                    <input type="hidden" name="grand_total" class="grand_total">
                                    <span
                                        class="amount grand-total"><strong>{{ 'Rp. ' . number_format($orders->Subtotal) }}</strong></span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-success btn-block  ">
                                    Go to checkout
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
