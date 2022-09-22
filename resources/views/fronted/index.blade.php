@extends('fronted.layout.layout')
@section('content')
        @include('common.message.message')
<header class="header ps-header--dark">
        @include('fronted.content-partial.top&_mobile_header')
        @include('fronted.content-partial.header')
        @include('fronted.content-partial.navbar')
        @include('fronted.content-partial.mobile_search_sidebar')
</header>

<main class="no-main ps-home--dark">
        @include('fronted.content-partial.slider')
        @include('fronted.content-partial.shopby')
        @include('fronted.content-partial.new_arrival')
        @include('fronted.content-partial.flash_sale')
        @include('fronted.content-partial.brandby')
        @include('fronted.content-partial.justfor_you')
</main>
        @include('fronted.content-partial.footer')
        @include('fronted.content-partial.m_foot_cat_nav')

@endsection