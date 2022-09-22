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
    <div class="container rounded bg-white mt-2 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>

            <div class="col-md-6 bg-secondary border-right">
                <h4 class="text-left  py-3">Your Profile </h4>
                @php
                     $user_pic_src = 'upload/user-img/'.auth()->user()->user_pic;
                    if (auth()->user()->user_pic == null) {
                        $user_pic_src = 'upload/user-img/user-profile.jpg';
                    }
                @endphp
                <div class="d-flex flex-column align-items-center text-center b">
                   <img class="rounded-circle" width="150px" src="{{ asset($user_pic_src) }}">
                 <span class="font-weight-bold text-light">{{ auth()->user()->email }}</span>
                </div>

                <div class="p-2 py-4">
                <form action="{{ route('users.update',Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-1">

                        <div class="col-md-12">
                            <label class="labels text-light">Your Name</label>
                            <input type="text"  class="form-control" style="font-size: 15px;padding:16px;16px" name="name"  value="{{ auth()->user()->name }}">
                        </div>

                        <div class="col-md-12">
                            <label class="labels text-light">Mobile </label>
                            <input type="text" class="form-control" style="font-size: 15px;padding:16px;16px" name="phone" value="{{ auth()->user()->phone }}">
                        </div>

                        <div class="col-md-12">
                            <label class="labels text-light"> Email</label>
                            <input type="text" class="form-control" style="font-size: 15px;padding:16px;16px" name="email" value="{{ auth()->user()->email }}">
                        </div>
                      

                        <div class="col-md-12">
                            <label class="labels text-light"> Address</label>
                            <textarea class="form-control" style="font-size: 15px;" name="address" cols="30" rows="3">{{ auth()->user()->address }}</textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="labels text-light"> @if (auth()->user()->user_pic==null)
                                Upload Your Picture
                                @else
                                Change Your Picture
                            @endif </label>
                            <input type="file" class="form-control" style="font-size: 14px;padding-bottom:30px" name="user_pic" >
                        </div>

                        
                    </div>

              

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" style="font-size: 16px" type="submit">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-md-3">
                {{-- <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div> --}}
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

