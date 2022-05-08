@extends('layouts.sidebarPages')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper give-min-ht">
        <div class="content-body container">
            <section id="pagination">
                @if($credCheck)
                    <div class="row">
                        <div class="col-md-8 overflow-exp-chat">
                            <div class="card-title text-center mb-2">
                                    <h1 class="crt-acc">Friends Suggestion</h1>
                            </div>  
                            <div class="row match-height">
                                @foreach($users as $user)

                                    @if($user->id != $lgnUser->id && !$user->banned &&  $user->sex != $lgnUser->sex && $user->avatar != 'profile_images/noimage.png' &&
                                     $user->work != Null && $user->education != Null && $user->bio != Null && 
                                     $user->visibility != Null && $user->sex != Null && $user->age != Null &&
                                      $user->country != Null && $user->state != Null)
                                        <div id="autoView" class="col-xl-4 col-md-6 col-sm-12">
                                            <div class="card userSug" id="{{$user->slug}}">
                                                <div class="card-content">
                                                <img class="card-img-top img-respx" src="{{ $user->avatar }}" alt="Image">
                                                <div class="card-body">
                                                    @if($user->visibility == $publiclyVis)
                                                        <h4 class="card-title">{{ $user->name }}</h4>
                                                    @elseif($user->visibility == $privatelyVis)
                                                        <h4 class="card-title">{{ $user->alias }}</h4>
                                                    @else
                                                        <h4 class="card-title">{{ $user->name }}</h4>
                                                    @endif                                         
                                                        <div class="text-center d-lg-none">
                                                            @if($user->state && $user->country != Null)
                                                            <div class="badge text-center mb-1 badge-pill badge-success">{{$user->state}}, {{$user->country}}</div>
                                                            @else
                                                            <div class="badge text-center mb-1 badge-pill badge-success"></div>
                                                            @endif
                                                            <div>                                                                                                
                                                                <a href="{{ route('addFriend', $user->slug) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a>
                                                            </div>
                                                        </div> 
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-4 d-none d-lg-block" id="fetchSug">
                            
                        </div>
                    </div>
                @elseif($lgnUser->avatar == 'profile_images/noimage.png')
                    <div class="bs-callout-pink mt-5">
                        <div class="media align-items-stretch">
                            <div class="media-body p-1">
                                <strong>Upload an Avatar!!!</strong>
                                <p>Hi <b>{{$lgnUser->name}}</b>, Please upload an Avatar.</p>
                                <div class="col-md-8">
                                    <a href="{{route('profile')}}"><button type="button" class="btn btn-md btn-warning">Upload Avatar</button></a>
                                </div>
                            </div>
                            <div class="media-right media-middle bg-pink p-2">
                                <i class="la la-slack white font-medium-5 mt-1"></i>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bs-callout-pink mt-5">
                        <div class="media align-items-stretch">
                            <div class="media-body p-1">
                                <strong>Incomplete Profile Details!!</strong>
                                <p>Hi <b>{{$lgnUser->name}}</b>, Your profile is incomplete. To get friend sugesstions, Please click on the button below to complete your registration process.</p>
                                <div class="col-md-8">
                                    <a href="{{route('editProfile')}}"><button type="button" class="btn btn-md btn-warning">Complete Registration</button></a>
                                </div>
                            </div>
                            <div class="media-right media-middle bg-pink p-2">
                                <i class="la la-slack white font-medium-5 mt-1"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        </div>
        </div>
    </div>
    <script>

        window.onload=function(){
            autoclicked =   document.getElementById("autoView");

            if(autoclicked){
                document.getElementById("autoView").firstElementChild.click();
            }

        };

        var sugUserId = '';
        $(document).ready(function () {
            // ajax setup for csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                                                    
            $('.userSug').click(function (){
                
                sugUserId = $(this).attr('id');
                $.ajax({
                    type:"get",
                    url: "displaySugUser/" + sugUserId, //need to create their route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#fetchSug').html(data);                        
                    }
                });
            
            });                                                            

                
        });

    </script>
@endsection