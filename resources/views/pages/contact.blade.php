@extends('layouts.mainFront')

@section('content')
    <div class="app-content content">
        <div class="content-body">
            <!-- Card overlay section start -->
            <section id="card-overlay" class="mt-5 container">
                <div class="row match-height">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/backgrounds/cont-img.png') }}" alt="Card image cap"/>
                                <div class="card-body">
                                    <div class="container mt-3">
                                        <h1 class="mb-3 mt-3"><b>Lets Keep in Touch</b></h1>                                        
                                    </div>

                                    <!-- Contact Form -->
                                    <form action=" {{ route('contact.save') }} "  method="POST">
                                        @csrf
                                        @if(session('success'))
                                            <div class="msgsdiv col-lg-6 offset-lg-3 alert alert-success text-center mt-1">
                                                <h5 class="text-white"><b>{{session('success')}}</b></h5>
                                            </div>
                                        @endif
                                        <div class="mt-5 container">
                                            <div class="form-group">
                                                <input class="form-control border-cont-form-orange" type="text" name="name" placeholder="Full Name" id="userinput1">
                                            </div>
                                        
                                            <div class="form-group">
                                                <input class="form-control border-cont-form-orange" type="email" name="email" placeholder="Email" id="userinput5">
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control border-cont-form-orange" type="text" name="subject" placeholder="Subject" id="userinput2">
                                            </div>

                                            <div class="form-group">
                                                <textarea id="userinput8" rows="5" class="form-control border-cont-form-orange" name="message" placeholder="Message"></textarea>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="menu-title btn btn-orange btn-block">Submit</button>
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
            <!-- Card overlay section end -->
        </div>
    </div>
@endsection