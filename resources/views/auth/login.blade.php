{{-- <section class="vh-100 gradient-custom"> --}}
@extends('layout.main')

@section('container')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card brown text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your email and password!</p>

                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Gagal</strong>
                                    <p>{{ $errors->first() }}</p>
                                </div>
                            @endif
                            <form action="/login" method="POST" class="form-login user mt-10">
                                @csrf
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg email"
                                        required>
                                    <label class="form-label" for="email" place>Email</label>
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg password" required>
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <button class="btn peach btn-outline-light btn-lg px-5 text-black" type="submit">Login</button>
                            </form>
                        </div>
                        <div>
                            <p class="mb-0">Don't have an account? <a href="/register"
                                    class="text-white-50 fw-bold">Register here.</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Bootstrap core JavaScript-->
    <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sbadmin2/js/sb-admin-2.min.js"></script>

    <script>
        $(function(){

            function setCookie(name,value,days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            }

            $('.form-login').submit(function(e){
                e.preventDefault();
                const email = $('.email').val()
                const password = $('.password').val()
                const csrf_token = $('meta[name="csrf-token"]').attr('content')

                $.ajax({
                    url  : '/login',
                    type : 'POST',
                    data : {
                        email : email,
                        password : password,
                        _token : csrf_token
                    },
                    success : function(data){
                        // console.log(data)
                        if (!data.success){
                            alert(data.message)
                        }

                        // setCookie('token', data.token, 7)
                        localStorage.setItem('token',data.token)
                        window.location.href = '/dashboard';
                    }
                });
            });
        });
    </script>

@endsection
{{-- </section> --}}
