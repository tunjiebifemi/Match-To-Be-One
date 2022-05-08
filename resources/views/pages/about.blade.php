@extends('layouts.mainFront')

@section('content')           
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Card overlay section start -->
                <div class="mt-2 mb-2">
                    <h1 class="text-center header-match">Match To Be One</h1>
                </div>
                <section id="card-overlay" class="mt-5">
                    <div class="row match-height">
                        <div class="col-md-10 offset-md-1">
                            <div class="card">
                                <div class="card-content">
                                    <div id="about-cv">
                                        <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/group-c-9.png')}}" alt="Card image cap"/>
                                    </div>
                                    <div class="card-body">
                                        <div class="container mt-5">                                            
                                            <p class="card-text">
                                            <span style="font-size:2.0rem ;">W</span>elcome to Match To Be One, Your number one Christian dating website. We are dedicated to producing more Godly 
                                            relationships with the sole aim of connecting God-fearing individuals who are of like minds.                                            
                                            We have made a collection of amazing write-ups and guidelines that will make your experience on our website worthwhile. 
                                            </p>
                                            <p>
                                            You will most definitely meet some sets of amazing persons on this website.                                            
                                            We also believe that there are many misconceptions about Christian dating and this is why we are open to speaking to you 
                                            about any aspects of a relationship that you want to know about.                                            
                                            Individuals on our website are not in any way negative as we have made sure every registered person is authentic. You can trust us to get you matched to someone whom your heart desires.

                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- Card overlay section end -->
            </div>
        </div>
    </div>
@endsection