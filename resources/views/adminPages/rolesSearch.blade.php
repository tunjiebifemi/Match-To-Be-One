@extends('layouts.adminPages')

@section('content')
    <div class="app-content content">
        <div class="content-body">
            <div class="container mt-5"> <!-- Main Page Section Start -->   
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mt-2 ">
                            <h1 class="crt-acc"><b>Search Results(Users)</b></h1>
                        </div>                        
                    </div>                       
                    <div id="recent-appointments" class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                        @if(count($users) > 0)
                        <h4 class="card-title">Results ({{count($users)}})</h4>
                        @elseif(count($users) < 1)
                        <h4 class="card-title">No Records Found</h4>
                        @endif
                        <form class="mt-1" action="{{ route('roles.search') }}" method="GET">
                            <div class="chat-app-input d-flex">
                                <fieldset class="form-group position-relative col-md-4 m-0">                                   
                                    <input type="text" class="form-control" name="search" placeholder="Search Users" autocomplete="on">
                                </fieldset>
                                <fieldset class="form-group position-relative col-md-2 m-0">
                                    <button type="submit" class="btn btn-outline-warning">Search</button>
                                </fieldset>
                            </div>                            
                        </form> 
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
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Sex</th>
                                <th class="border-top-0">Admin</th>
                            </tr>
                                </thead>
                                <tbody>
                            @foreach($users as $user)                        
                            <tr class="pull-up">
                                <td class="text-truncate"><a class="text-truncate" href="{{url('admin/viewUserProfile/'.$user->slug)}}"><img class="media-object rounded-circle avatar avatar-sm pull-up" src="{{asset($user->avatar)}}"
                                        alt="Avatar"><span class="mr-1"></span> {{ $user->name }} </a></td>
                                <td class="text-truncate"> {{$user->alias}} </td>
                                <td class="text-truncate"> {{$user->email}} </td>
                                <td class="text-truncate"> {{$user->sex}} </td>
                                <td>
                                    @if($user->super_admin)
                                    <button type="button" class="btn btn-sm btn-outline-dark round" disabled><i class="la la-star-o"></i></button>                            
                                    @elseif($user->admin)
                                    <a id="remove-admin-role" href="{{route('removeAdminRole',$user->slug)}}"><button type="button" class="btn btn-sm btn-outline-danger round">Yes</button></a>
                                    @else
                                    <a id="confirm-admin" href="{{route('giveAdminRole',$user->slug)}}"><button type="button" class="btn btn-sm btn-outline-success round">No</button></a>
                                    @endif
                                </td>
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
    <script>
        $('#confirm-admin').on('click', function () {
                return confirm('Are You sure You want to make this User an Admin?');
        }) 
        
        $('#remove-admin-role').on('click', function () {
                return confirm('Are You sure You want to remove this User as an Admin?');
        }) 
    </script> 
@endsection