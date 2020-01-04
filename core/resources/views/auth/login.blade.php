@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/front/css/form.css')}}">
@stop
@section('content')

    <div class="page-title-area" style="background:none;">
        <div style="max-height: 50px;" class="container">
            <div class="page-title">
                <!-- <h1 class="plus-margin">{{$page_title}}</h1> -->
            </div>
        </div>
    </div>


    <!-- login page content area start -->
    <section class="login-page-area" style="background-color: #18084a;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title" style="color: white;">Login Your Account</h2>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-wrapper"><!-- login form wrapper -->


                        @if (session('logout'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('logout') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('danger') }}
                            </div>
                        @endif


                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="text" class="input-field" name="username" placeholder="Enter Username"  value="{{ old('username') }}">
                                <div class="the-icon">
                                    <i class="far fa-user"></i>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="error ">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="password" class="input-field" name="password" placeholder="Enter Password">
                                <div class="the-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>

                            <div class="btn-wrapper margin-bottom-20">
                                <div class="left-content">
                                    <input type="submit" class="submit-btn" value="Login">
                                </div>
                                <div class="right-content">
                                    <a href="{{ route('password.request') }}" class="anchor">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="from-footer">
                                <span class="ftext">Not a member?  <a href="{{ route('register') }}">Create an Account</a></span>
                            </div>
                        </form>
                    </div><!-- //. login form wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- login page content area end -->

@endsection


@if(session()->has('email_verify'))

    <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            Swal.fire({
              type: 'error',
              title: 'Oops... Email not verified!',
              text: '{{ session()->get("email_verify") }}',
            })
        });

    </script>

@endif

@if(session()->has('wrong_token'))

    <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            Swal.fire({
              type: 'error',
              title: 'Oops... Wrong token!',
              text: 'Wrong invitation token! Please check your URL.',
            })
        });

    </script>

@endif

@if(session()->has('successfull_verification'))

    <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            Swal.fire({
              type: 'success',
              title: 'Congratulations!',
              text: '{{ session()->get("successfull_verification") }}',
            })
        });

    </script>

@endif