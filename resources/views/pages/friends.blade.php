@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper give-min-ht">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="">
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mb-2">
                            <h1 class="crt-acc"><b>Friends ({{$friendCount}})</b></h1>
                        </div>                        
                    </div>
                <!-- Row of the page contents -->

                    <div class="container" id="doctors-list">
                        <div class="row match-height">
                        @foreach($users as $user)
                            <div class=" col-xl-4 col-lg-4 col-md-6">
                                <a href=" {{route('friendsProfile', $user->slug)}} " >
                                    <div class="card text-center">
                                        <img src="{{ asset($user->avatar) }}" alt="Profile Picture" class="card-img-top img-fluid rounded-circle w-25 mx-auto mt-1">
                                        <div class="card-body">
                                            <h6 class="card-title font-large-1 mb-0 text-center">{{$user->name}}</h6>                                                        
                                            <p class="font-medium-3  text-center">{{$user->alias}}</p>
                                            <p class="font-small-3 text-center">{!!$user->bio!!}</p>        
                                        </div>                                    
                                        <div class="card-footer mx-auto text-center">                                                    
                                            <a class="btn btn-outline-warning btn-min-width mr-1 mb-1" href=" {{route('friendsProfile', $user->slug)}} ">View Profile</a>                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach  
                        </div>
                    </div>  
                </section>
                    
            </div>
        </div>
    </div>
@endsection