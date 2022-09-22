@extends('fronted.layout.layout')
@section('content')
    <header class="header">
            @include('fronted.content-partial.top&_mobile_header')
            @include('fronted.content-partial.header')
            @include('fronted.content-partial.navbar')
            @include('fronted.content-partial.mobile_search_sidebar')
    </header>

    <main class="no-main">

<section class="section--login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="login__box">
                    <div class="login__header">
                        <h3 class="login__login">LOGIN</h3>
                        <h3 > <span class="login__register">OR &nbsp;</span> <a href="{{ route('user.register') }}"><strong style="color: green" >REGISTER</strong></a> </h3>
                    </div>
                    <form method="POST" action="{{ route('user.check') }}">
                        @csrf

                    <div class="login__content">
                        <div class="login__label">Login to your account.</div>
                        <div class="input-group">
                            <input id="email" type="email" style="font-size:18px;
                            " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username/ Email" required autocomplete="email" autofocus>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            {{-- <input class="form-control" type="email" name="email" placeholder="Username/ Email"> --}}
                        </div>
                        <div class="input-group group-password">

                            <input id="password" type="password" style="font-size:18px;
                            " class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                            
                           
                        </div>
                        <div class="input-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                           
                        </div>
                   
                        <button type="submit" class="btn btn-login">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <br>
                    <small class="text-primary">are you our business partner?</small>
                    <a class="btn-link" href="{{ route('seller.login') }}">
                        {{ __('click to login') }}
                    </a>
                    </div>
                    </form>
                  
                </div>
            </div>
            
        </div>
    </div>
</section>
</main>
@include('fronted.content-partial.footer')
@include('fronted.content-partial.m_foot_cat_nav')
@endsection

