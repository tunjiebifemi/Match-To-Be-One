@extends('layouts.main')

@section('content')
    <div class="vertical-layout vertical-compact-menu bg-gray 1-column bg-lighten-4 menu-expanded blank-page blank-page">
        <div class="container" >   
            <nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-transparent border-grey border-lighten-2">
                <div class="navbar-wrapper mt-3">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item mobile-menu d-md-none float-left">
                                <button class="nav-link menu-toggle hamburger hamburger--arrow js-hamburger is-active"><span
                                        class="hamburger-box"></span><span class="hamburger-inner"></span></button>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="navbar-brand nav-link"><img src="{{ asset('app-assets/images/logo/group-16.png') }}"
                                        alt="branding logo"></a>
                            </li>
                            <li class="nav-item d-md-none float-right"><a data-toggle="collapse" data-target="#navbar-mobile10"
                                    class="nav-link open-navbar-container"><i class="la la-ellipsis-h pe-2x icon-rotate-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="navbar-container content float-right">
                        <div id="navbar-mobile10" class="bg-white rounded collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="{{ url('/about') }}">About</a></li>
                                <li class="nav-item"><a class="nav-link " href="{{ url('/blog') }}" role="button">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="app-content content">
            <div class="content-wrapper give-min-ht">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="">
                    <!-- Row of the page contents -->
                        <div class="row mt-5 mb-5">
                            
                            <div class="col-md-5 offset-md-3">
                                <div class="box-shadow-2 p-0">
                                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                        <div class="card-header border-0 pb-0">
                                            <div class="card-title text-center mb-2">
                                                <h1 class="crt-acc"><b>Reset Password</b></h1>                                                                                                
                                            </div>
                                            
                                        </div>
                                        <div class="card-content container">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput3">E-mail Address</label>
                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                               
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                                                                                                                                  
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-orange btn-block">Send Password Reset Link</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
                        

                </div>
            </div>
            </div>

        </div>
    </div>
@endsection