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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/single-page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/hospital-patient-profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-callout.css') }}">
     <!-- BEGIN Page Level CSS-->     
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <div id="app">
        @include('inc.sidebarNav')
            @include('inc.sidebar')
            @include('inc.messages')
            @yield('content')
        @include('inc.footer')
    </div>

    
    
    
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/crypto-wallet.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    
   
    <script>
    

      var fade_out = function() {
        $(".msgsdiv").fadeOut().empty();
      }

      setTimeout(fade_out, 5000);

      $("#bar").change(function() {

      var value = $(this).val();

      // if (value == 0) {
      //    $("#slider").val("Freezing");
      // } 
      if (value == 25) {
          $("#slider").val("Between 25 and 35");
          } 
          else if (value == 35) {
          $("#slider").val("Between 35 and 45");
          } 
          else if (value == 45) {
          $("#slider").val("Between 45 and 55");
          }
          else if (value == 55) {
          $("#slider").val("Between 55 and 60");
          }

          $("#labelTemp").text($("#slider").val());

          // console.log($("#slider").val());

      });
    </script>
    @include('sweetalert::alert')
  </body>
</html>