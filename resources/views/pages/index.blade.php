@extends('layouts.main')

@section('content')
    <div class="vertical-layout vertical-compact-menu  1-column bg-lighten-2 menu-expanded blank-page blank-page">
        <!-- First Page Section Start -->
        <div id="bg-main-page" class="mb-5">
            <div class="container" >   
                <nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-transparent border-grey border-lighten-2">
                    <div class="navbar-wrapper mt-3">
                        <div class="navbar-header">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" class="navbar-brand nav-link"><img class="brand-logo" src=" {{asset('app-assets/images/logo/group-16.png')}} "
                                            alt="branding logo"></a>
                                </li>
                                <li class="nav-item d-md-none float-right"><a data-toggle="collapse" data-target="#navbar-mobile10"
                                        class="nav-link open-navbar-container"><i class="la la-bars pe-2x icon-rotate-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="navbar-container content float-right">
                            <div id="navbar-mobile10" class="bg-white rounded collapse navbar-collapse">
                                <ul class="nav navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link"></a></li>
                                    <li class="nav-item"><a class="nav-link active" href="{{ url('/about') }}">About</a></li>
                                    <li class="nav-item"><a class="nav-link " href="{{ url('/blog') }}" role="button">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
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
                                    <div class="col-md-5">
                                        <div class="box-shadow-2 p-0">
                                            <div id="sign-up-crt" class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                                <div class="card-header border-0 pb-0">
                                                    <div class="card-title text-center mb-1">
                                                        <h1 class="crt-acc"><b>Create Account</b></h1>
                                                        <p>By clicking Log In, you agree to our Terms. Learn how we
                                                        process your data in our Privacy Policy and Cookie Policy.</p>
                                                    </div>
                                                    <div class="card-body pt-0 text-center">
                                                    <p>                                                            
                                                        <input type="checkbox" class="form-check-input" id="checkCond" onclick="toggleCheck()">                                                                                                                           
                                                        I accept the Terms & Conditions. My data is collected pursuant to the Privacy Policy.
                                                    </p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="card-content">
                                                    <div id="reg-form" class="hidden">
                                                        <div class="card-body pt-0">
                                                        <a href="{{ route('register') }}" class="btn btn-outline-orange text-orange btn-block">Sign up with Email</a>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <a href="{{ route('login.facebook') }}" class="btn btn-outline-orange text-orange btn-block">Login with Facebook</a>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <a href="{{ route('login.google') }}" class="btn btn-outline-orange text-orange btn-block">Login with Google</a>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="card-body pt-0 text-center">
                                                        <p><b>Already Registered?</b> <a class="text-link-orange" href="{{ route('login') }}">Log in</a></p>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">                                        
                                    </div>
                                </div>
                            </section>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- First Page Section End -->

        <!-- Second Page Section start -->        
        <div class="bg-white container">
            <div class="row">
                <div id="ipad-im" class="col-md-5 mt-5 mb-3 d-none d-lg-block">
                    {{-- Contains a background Image --}}
                    <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/iPad-mockup-x2.png')}}" alt="Card image cap"> 
                </div>
                <div class="col-md-7 mt-3 mb-3">
                    <div class="">
                        <div class="card-content">
                            <div class="card-body">
                                <h1 class="thick-org-header mb-2">More than just dating</h1>
                                <p class="card-text">
                                    <span style="font-size:2.0rem ;">W</span>elcome to our dating website where we have created an easy and convenient way for you to be matched. 
                                    If this is your first time here, we really want to say welcome to Match To Be One. 
                                    This is the best Christian dating website and get ready to be matched with your heart rob. 
                                    <p>
                                    To be part of this amazing community and enjoy some certain benefits, we implore you to sign 
                                    up to our website. Our newsletters will be rolling out from time to time and we would love you to be one 
                                    of the first persons to get them.
                                    </p>
                                    Signing up also helps in matching evenly and enables us know the type of persons that meets your dating match. 
                                    There are guidelines and rules concerning our website and signing up would make you understand them very well.
                                    <br>
                                    Thank you for stopping by, have fun and do not forget to <a class="text-link-orange" href="#sign-up-crt">sign up</a>.

                                </p>
                            </div>
                            <div id="mask-grop">
                                <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/mask-group-x2.png')}}" alt="Card image cap"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Page Section end -->
    </div>
    <footer class="footer footer-static footer-gray navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 col-11">
          <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><a class="footer-text-white" href="{{ url('/stayingSafe') }}">Staying Safe</a></span>
          <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block mr-lg-5"><a class="footer-text-white" href="{{ url('/codeOfConduct') }}">Code of Conduct</a></span>
        </p>
    </footer>
    <script>
        function toggleCheck(){
            $('#reg-form').toggleClass('hidden');
        }
    </script>
@endsection