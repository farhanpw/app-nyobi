@extends('layout.main')

@section('container')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your email and password!</p>
                            <br>
                            @if (Session::has('errors'))
                                <ul>
                                    @foreach (Session::get('errors') as $error)
                                        <li style="color: red">{{ $error[0] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (Session::has('success'))
                                <p style="color: green">{{ Session::get('success') }}</p>
                            @endif
                            @if (Session::has('failed'))
                                <p style="color: red">{{ Session::get('failed') }}</p>
                            @endif
                            <form action="/login_member" method="POST" class="mt-10">
                                @csrf
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        required>
                                    <label class="form-label" for="email" place>Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" required>
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="">Forgot password?</a>
                                </p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="/register_member"
                                    class="text-white-50 fw-bold">Register here.</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
