<div class="my-custom-scrollbar my-custom-scrollbar-primary">
    <div class="overflow-class-chat">
        <div class="content-wrapper">
            @foreach($users as $user)
                @if(Auth::id() != $user->id)
                    <div class="media-list mb-2 card user" id="{{ $user->id }}">
                        <div class="media border-0">
                            <div class="media-left pr-1">
                                <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{ $user->avatar }}"
                                        alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="media-body w-100">
                                <h6 class="list-group-item-heading">{{ $user->name }}<span class="font-small-3 float-right info">4:14
                                        AM</span></h6>
                                <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> {{ $user->message}}
                                    <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
                            </div>
                        </div>
            
            
                    </div>
                @endif
            @endforeach        
        </div>
    </div>
</div>




