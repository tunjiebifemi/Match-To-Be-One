@foreach($sugUsers as $sugUser)   
<div class="p-1">
    <div class="card">
        <div class="card-content">
            <img class="img-res-syd card-img-top img-fluid" src="{{ $sugUser->avatar }}" alt="">
            <div class="card-body">
                @if($sugUser->visibility == $publiclyVis)
                    <h4 class="card-title">{{$sugUser->name}}</h4>
                @elseif($sugUser->visibility == $privatelyVis)
                    <h4 class="card-title">{{$sugUser->alias}}</h4>
                @else
                    <h4 class="card-title">{{$sugUser->name}}</h4>
                @endif
                <p class="card-text">
                    {!!$sugUser->bio!!}
                </p>
                <div class="text-center">
                    @if($sugUser->state && $sugUser->country != Null)
                        <div class="badge text-center mb-1 badge-pill badge-success">{{$sugUser->state}}, {{$sugUser->country}}</div>
                    @else
                    <div class="badge text-center mb-1 badge-pill badge-success"></div>
                    @endif
                </div>
                <div class="text-center">                                       
                        <a href="{{ url('/add-friend/'.$sugUser->slug) }}" class="btn btn-success btn-md rounded-circle"><i class="la la-heart"></i></a>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach