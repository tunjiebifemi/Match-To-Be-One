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
                            <h1 class="crt-acc"><b>Add/Delete Pictures</b></h1>
                        </div>                        
                    </div>
                <!-- Row of the page contents -->

                    <div class="container" id="doctors-list">
                        <div class="row match-height">
                        
                            <div class="col-lg-10 offset-lg-1 col-sm-12">                               
                                <div class="card text-left">                                    
                                    <div class="card-body">                                       
                                        <div class="row">
                                            @foreach($user->images as $userImage)
                                                <div class="col-md-3 p-1">                                                    
                                                    <div class="text-center">
                                                        <img width="150" height="150" src="{{asset($userImage->image_url)}}" alt="Gallery Picture">
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="btn-group mr-1 mb-1 mt-1">
                                                            <button type="button" class="btn btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Action</button>
                                                            <div class="dropdown-menu">                                                                                                            
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="{{route('deleteUserPicture', $userImage->id)}}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if(count($user->images) <4)
                                                <div class="col-md-3 p-1">
                                                    <div class="text-center">
                                                        <a id="upload_link">
                                                            <img width="100" height="100" src="{{asset('gallery_images/add-icon.png')}}" alt="Add-Icon">
                                                        </a>
                                                        <form action="{{route('replaceUserPicture')}}" method="POST" enctype="multipart/form-data" id="myform">
                                                            <input id="upload" name="image_url" type="file"/>
                                                        </form>
                                                    </div>
                                                    <div class="text-center mb-1 mt-2">
                                                        <h3>Add Image</h3>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>                                        
                                    </div>                                    
                                    <div class="card-footer mx-auto text-center">
                                        <p><i>You can have a maximum of only 4 images in Your gallery.</i></p>
                                    </div>
                                </div>                                
                            </div>                        
                        </div>
                    </div>  
                </section>                    
            </div>
        </div>
    </div>

    <script>
        $(function(){
           $("#upload_link").on('click', function(e){
               e.preventDefault();
               $("#upload:hidden").trigger('click');
           });
       });



       $(document).ready(function () {
           // ajax setup for csrf token
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           $("#upload").change(function(e)  {                          
                           
               
               var image = document.querySelector('#myform input[name=image_url');

               // Creating an instance of FormData to submit the form.
               var formData = new FormData();                                
               formData.append('image_url', image.files[0]);
                                               
                 $.ajax({
                     type: "post",
                     enctype: 'multipart/form-data',
                     url: "{{route('replaceUserPicture')}}", //need to create in controller
                     data: formData,
                     cache: false,
                     contentType: false,
                     processData: false,
                     success: function (data) {
                       location.reload();
                     },
                     error: function (jqXHR, status, err) {
                     }                      
                 })              
           });
       });

    </script>

@endsection