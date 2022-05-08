<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Christian dating platform">
    <meta name="keywords" content="Christian dating, Relationship, dating, love, marriage courtship">
    <meta name="author" content="Match To Be One">
    <title> {{$title}} </title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/chat-application.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css') }}">

    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu content-left-sidebar chat-application  menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">

    <div id="app">
        @include('inc.sidebarNav')
            @include('inc.sidebar')
            @include('inc.messages')
            @yield('content')
    </div>
         
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/30.0.0/ckeditor.min.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
    
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/chat-application.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <script>

      var user_selected_mobile = "";   
      var receiver_id = '';
      var my_id = "{{ Auth::id() }}";
      var my_slug = "{{ Auth::user()->slug }}";
      var myEditor = ""; 
      $(document).ready(function () {

          // ajax setup for csrf token
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
  
        
  
          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;
  
          var pusher = new Pusher('320ee5f4fe0e767a8bb7', {
          cluster: 'eu',
          forceTLS: true,
          });
  
              
  
          var channelFetch = pusher.subscribe('fetch-chats');
          channelFetch.bind('fetch-users', function() {                                                    
      
          });
                                            
                    getUserMessageBox(null);
             
           
          var channel = pusher.subscribe('my-channel');
              channel.bind('message-sent', function(data) {
              //alert(JSON.stringify(data.datas));
              if (my_id == data.datas.from) {
                  $('#' + data.datas.to_slug).click();
              } else if (my_slug == data.datas.to_slug) {
                  if (receiver_id == data.datas.from_slug) {
                      //If receiver is selected, reload the selected user..
                      $('#' + data.datas.from_slug).click();
                  } else {
                      // if receiver is not seleted, add notification for that user
                      var pending = parseInt($('#' + data.datas.from_slug).find('.pending').html());

                  }
              }
  
          });

          // channel.bind('client-message-delivered', onMessageDelivered);
  
          // function onMessageDelivered(data) {
          //     $("#" + data.id +'_message'.text("Some Content");
          // }
                        
  
          //
  
          $(document).on('click', '#sendMess', function (e) { 
           
              // var message = $('#body').val();
              // console.log('our value', CKEDITOR.instances['editor'].getData())           
              message = $("#myform textarea[name=message]").val();                     
              var image = document.querySelector('#myform input[name=image]');
              // Creating an instance of FormData to submit the form.
              var formData = new FormData();
                        

              formData.append('message', myEditor.getData());
              formData.append('image', image.files[0]);
              formData.append('receiver_id', receiver_id);

              // Check if enter key is pressed and mesage is not null also if receiver is selected
              if (receiver_id != '' && myEditor.getData() != '' || image.value.length != 0) {                
                                               
                // Disable SendMessage Button onClick
                $("#sendMess").prop('disabled', true);

                  $.ajax({
                      type: "post",
                      enctype: 'multipart/form-data',
                      url: "chat", //nedd to create in controller
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function (data) {
                        $("#sendMess").prop('disabled', false);
                            $('#' + receiver_id + '_message').text($("#myform textarea[name=message]").val())
                      },
                      error: function (jqXHR, status, err) {
                      },
                      complete: function () {
                          scrollToBottomFunc();
                      }
                  })
              }
          });
          
          const urlParams = new URLSearchParams(window.location.search);
          const myParam = urlParams.get('xDFoPW');
          if( myParam != null){
            getUserMessageBox(myParam);
          }


      });
  
      // make a function to scroll down auto
      function scrollToBottomFunc() {
          $('.message-wrapper').animate({
              scrollTop: $('.message-wrapper').get(0).scrollHeight
          }, 50);
      }


      $('.user').click(function (){ 
        var ww = $(window).width();
            if (ww < 500) {
              $("#userslist").hide();
            }    
    
        receiver_id = $(this).attr('id');
     
        getUserMessageBox(receiver_id);

      });


      function getUserMessageBox(value){               
              
              $('.user').removeClass('active');
              $(this).addClass('active');              

              if(value != null){
                $.ajax({
                  type:"get",
                  url: "message/" + value, //need to create their route
                  data: "",
                  cache: false,
                  success: function (data) {
                      $('#messages').html(data);
                      scrollToBottomFunc();
                      poulateMobileuser(receiver_id);
                  },
                  error: function (data){
                    console.error(data);
                  }
              });  
              }
      }

        
      function poulateMobileuser(user_id){
        $.ajax({
            type:"get",
            url: "mobileUserDetails/" + user_id, 
            data: "",
            cache: false,
            success: function (data) {                                
              let newData = JSON.parse(data);
              let userImage = newData.UserPicture.includes('http') ? newData.UserPicture : '/match/public/' + newData.UserPicture;
                $('#mobileUserImage').attr('src', userImage);
      
                $('#mobileUserFullName').text(newData.FullName);
            }
        });
      }
        
         
  </script>
  @include('sweetalert::alert')
</body>
</html>