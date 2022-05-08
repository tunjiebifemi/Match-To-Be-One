@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="msgsdiv col-lg-6 offset-lg-3 alert alert alert-danger text-center mt-1">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="msgsdiv col-lg-6 offset-lg-3 alert alert-success text-center mt-1">
        <h5 class="text-white"><b>{{session('success')}}</b></h5>
    </div>
@endif

@if(session('error'))
    <div class="msgsdiv col-lg-6 offset-lg-3 alert alert-danger text-center mt-1">
        <h5 class="text-white"><b>{{session('error')}}</b></h5>
    </div>
@endif

