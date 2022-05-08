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
                                <a href="index.html" class="navbar-brand nav-link"><img src="app-assets/images/logo/logo-dark4.png"
                                        alt="branding logo"></a>
                            </li>
                            <li class="nav-item d-md-none float-right"><a data-toggle="collapse" data-target="#navbar-mobile10"
                                    class="nav-link open-navbar-container"><i class="la la-ellipsis-h pe-2x icon-rotate-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="navbar-container content float-right">
                        <div id="navbar-mobile10" class="bg-white rounded collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link"></a></li>
                                <li class="nav-item"><a class="nav-link active" href="#">About</a></li>
                                <li class="nav-item"><a class="nav-link " href="#" role="button">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                <li class="nav-item"><a class="nav-link active"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="app-content content">
            <div class="content-wrapper">
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
                                                <h1 class="crt-acc"><b>Create Account</b></h1>
                                            </div>
                                            
                                        </div>
                                        <div class="card-content container">
                                            <form class="form">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" id="projectinput1" class="form-control" placeholder="Full Name" name="fname">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="lname">
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" id="projectinput4" class="form-control" placeholder="password" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" id="projectinput4" class="form-control" placeholder="Re-type password" name="password">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-orange btn-block">Create Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-body pt-0 text-center">
                                                <p><b>Already Registered?</b> <a class="text-link-orange" href="{{ route('login') }}">Log in</a></p>
                                                <p>I accept the Terms & Conditions. My data is
                                                    collected pursuant to the Privacy Policy.</p>
                                            </div>
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