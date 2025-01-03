@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
        <!-- <div class="col-lg-3 col-12">
</div> -->
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <h2 class="auth-title">Forgot Password</h2>
                    <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
                    @if (session('message'))
                        <div class="text-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    <form class="md-float-material" method="POST" action="/forget-password">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " placeholder="Email Address">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Login</a>.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div> -->
        </div>
    </div>
@endsection
