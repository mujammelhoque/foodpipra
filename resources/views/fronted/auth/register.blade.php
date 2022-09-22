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
                        <h3  <a href="{{ route('register') }}"><strong style="color: green" >Register Form</strong></a> </h3>
                    </div>
                    
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" style="padding:18px 18px; font-size:16px;
                                " class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" style="padding:18px 18px; font-size:16px;
                                " class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <textarea id="address" style="font-size:16px;
                                " class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus cols="30" rows="3">{{ old('address') }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                      
                      

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" style="padding:18px 18px; font-size:16px;
                                " type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" style="padding:18px 18px; font-size:16px;
                                " class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" style="padding:18px 18px; font-size:16px;
                                " class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="font-size:16px;" type="submit" class="btn btn-primary">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
</main>
@include('fronted.content-partial.footer')
@include('fronted.content-partial.m_foot_cat_nav')
@endsection

