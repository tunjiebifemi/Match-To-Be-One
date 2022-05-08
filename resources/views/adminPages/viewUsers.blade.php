@extends('layouts.adminPages')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="app-content content">
        <div class="content-body">
            <div class="container mt-5"> <!-- Main Page Section Start -->   
                    <div class="mt-4 mb-3">
                        <div class="card-title text-center mt-2 ">
                            <h1 class="crt-acc"><b>Users</b></h1>
                        </div>                        
                    </div>                       
                    <div id="recent-appointments" class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Users" />
                            </div>
                        </div>
                        </div>
                        <div class="card-content mt-1">
                        <div class="table-responsive">
                            <h3 align="center">Total Records : <span id="total_records"></span></h3>
                            <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                                <thead>
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Alias</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Sex</th>
                                <th class="border-top-0">Location</th>                                
                            </tr>
                                </thead>
                                <tbody>
                                    
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
        
            

          $.ajax({
           url:"{{ route('viewUsers.action') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
    </script> 
@endsection