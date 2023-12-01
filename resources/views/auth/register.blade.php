{{-- <section class="vh-100 gradient-custom"> --}}
@extends('layout.main')

@section('container')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card brown text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                            <p class="text-white-50 mb-5">Please fill in the column below</p>

                            <br>
                            @if (Session::has('errors'))
                                <ul>
                                    @foreach (Session::get('errors') as $error)
                                        <li style="color: red">{{ $error[0] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="/register" method="POST" class="mt-10">
                                @csrf
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-lg" required>
                                    <label class="form-label" for="name" place>Nama Member</label>
                                </div>
{{-- 
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                        required>
                                    <label class="form-label" for="phone">Nomor Telepon</label>
                                </div> --}}

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        required>
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" required>
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                                        class="form-control form-control-lg" required>
                                    <label class="form-label" for="konfirmasi_password">Konfrimasi Password</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </form>

                        </div>

                        <div>
                            <p class="mb-0">Have an account? <a href="/login" class="text-white-50 fw-bold">Login
                                    here.</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- </section> --}}
