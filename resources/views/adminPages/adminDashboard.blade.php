@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card bg-gradient-directional-danger">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <b><h3 class="text-white">{{count($administrators)}}</h3></b>
                                        <span><b>Administrators</b></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user text-white font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-6 col-12">
                    <a href=" {{route('viewUsers')}} ">
                    <div class="card bg-gradient-directional-success">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{count($users)}}</h3>
                                        <span><b>Users</b></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-users text-white font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>            
                <div class="col-xl-4 col-lg-6 col-12">
                    <a href=" {{route('blog')}} ">
                    <div class="card bg-gradient-directional-amber">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left">
                                        <h3 class="text-white">{{count($blogPosts)}}</h3>
                                        <span><b>Blog Posts</b></span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-note text-white font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>              
            </div>
            <!-- Main Page Section Start -->               
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <a href=" {{route('blogAdminView')}} ">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <i class="icon-note info font-large-2"></i>
                                    </div>
                                    <div class="media-body text-center mt-1">                                        
                                        <h6><b>Blog(Admin View)</b></h6>
                                    </div>                                    
                                </div>                              
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <a href=" {{route('createBlogPost')}} ">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <i class="icon-pencil warning font-large-2"></i>
                                    </div>
                                    <div class="media-body text-center mt-1">                                        
                                        <h6><b>Create Blog Post</b></h6>
                                    </div>                                    
                                </div>                              
                            </div>
                        </div>
                    </div>
                    </a>
                </div>  
                @if(Auth::user()->super_admin)             
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{route('adminRole')}}">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <i class="icon-key danger font-large-2"></i>
                                        </div>
                                        <div class="media-body text-center mt-1">                                        
                                            <h6><b>Admin Role</b></h6>
                                        </div>                                    
                                    </div>                              
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endif
                <div class="col-xl-3 col-lg-6 col-12">
                    <a href="{{route('banUser')}}">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <i class="icon-close danger font-large-2"></i>
                                    </div>
                                    <div class="media-body text-center mt-1">                                        
                                        <h6><b>Ban User</b></h6>
                                    </div>                                    
                                </div>                              
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                 <!-- Row For Cards Start -->
            </div> <!-- Row For Cards End -->
                {{-- Dashboard Table --}}                                                                    
                <div id="recent-appointments" class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Administrators</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                        
                        </div>
                        </div>
                        <div class="card-content mt-1">
                        <div class="table-responsive">
                            <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                                <thead>
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Alias</th>
                                <th class="border-top-0">Location</th>                                
                            </tr>
                                </thead>
                                <tbody>  
                            @foreach($administrators as $administrator)                       
                            <tr class="pull-up">
                                <td class="text-truncate"><img class="media-object rounded-circle avatar avatar-md pull-up" src="{{asset($administrator->avatar)}}"
                                        alt="Avatar"><span class="mr-1"></span>{{$administrator->name}}</td>                                
                                <td class="text-truncate"> {{$administrator->alias}} </td>
                                {{-- Location TD Start --}}
                                @if($administrator->state && $administrator->country !=null)                                
                                    <td class="text-truncate">{{$administrator->state}}, {{$administrator->country}}</td>
                                @else
                                    <td class="text-truncate"></td>
                                @endif
                                {{-- Location TD end --}}
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>                
        </div>  <!-- Main Page Section End --> 
        </div>
    </div> 
@endsection