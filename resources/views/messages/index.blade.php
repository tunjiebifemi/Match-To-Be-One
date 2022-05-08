<div class="content-wrapper">

    
        <div class="card text-center d-lg-none">
            <div class="text-center">
                <img width="30" height="30" class="media-object rounded-circle" id="mobileUserImage" src="" alt="image">
            </div>        
            <h5 class="card-title" id="mobileUserFullName">
                <span class="avatar avatar-sm avatar">               
                </span>                     
            </h5>      
        </div>
    
    <div class="text-center d-lg-none">
       <a href="{{url('chat')}}"><p style="color:blue;"><b><i style="font-weight:bolder;" class="la la-angle-left"></i>Chats</b></p>
       </a>
    </div>
    
    <div class="overflow-class-chat">
        <div class="content-body">            
            <section class="chat-app-window message-wrapper">                
                
            <div class="badge badge-default mb-1">
                Chat History
            </div>
            <div class="chats message-wrapper">                
                <div class="chats">
                    @foreach($messages as $message)
                        <div class="{{ ($message->msg_from == Auth::id()) ? 'chat' : 'chat-left' }}">
                            <div class="chat-body">
                                <div class="chat-content">
                                @if($message->message !== null)
                                    <p>{!! $message->message !!}</p>
                                @endif
                                </div>
                                <div>
                                    @if($message->image !== null)
                                        {{-- <img width="300px" height="300px" class="" src=" {{asset($message->image)}} " alt=""> --}}
                                        <div class="card-content">
                                            <div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                                                <div class="row">
                                                    <figure class="col-md-12 col-sm-12 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                        <a href="{{asset($message->image)}}" itemprop="contentUrl" data-size="580x460">
                                                            <img class="img-thumbnail img-fluid" src="{{asset($message->image)}}" itemprop="thumbnail" alt="Image description" />
                                                        </a>
                                                    </figure>                                                   
                                                </div>                                                            
                                            </div>
                                            <!--/ Image grid -->
                                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                                <!-- Background of PhotoSwipe. 
                                              It's a separate element as animating opacity is faster than rgba(). -->
                                                <div class="pswp__bg"></div>
                                                <!-- Slides wrapper with overflow:hidden. -->
                                                <div class="pswp__scroll-wrap">
                                                    <!-- Container that holds slides. 
                                               PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                              Don't modify these 3 pswp__item elements, data is added later on. -->
                                                    <div class="pswp__container">
                                                        <div class="pswp__item"></div>
                                                        <div class="pswp__item"></div>
                                                        <div class="pswp__item"></div>
                                                    </div>
                                                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                    <div class="pswp__ui pswp__ui--hidden">
                                                        <div class="pswp__top-bar">
                                                            <!--  Controls are self-explanatory. Order can be changed. -->
                                                            <div class="pswp__counter"></div>
                                                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                            <button class="pswp__button pswp__button--share" title="Share"></button>
                                                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                                            <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                            <!-- element will get class pswp__preloader-active when preloader is running -->
                                                            <div class="pswp__preloader">
                                                                <div class="pswp__preloader__icn">
                                                                    <div class="pswp__preloader__cut">
                                                                        <div class="pswp__preloader__donut"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                            <div class="pswp__share-tooltip"></div>
                                                        </div>
                                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                        </button>
                                                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                        </button>
                                                        <div class="pswp__caption">
                                                            <div class="pswp__caption__center"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            <img src="#" class="hidden" id="category-img-tag" width="50px" height="50px">
            </section>
            @if($checkIfFriend && $checkIfBan->banned != 1)
            <section class="chat-app-form">
                <form  method="POST" enctype="multipart/form-data" id="myform">
                    @csrf
                    <div class="chat-app-input d-flex">
                        <fieldset class="form-group position-relative has-icon-left col-9 m-0">
                            <div class="form-control-position">                            
                            </div>
                            <textarea class="form-control"  name="message" id="editor" class="submit" placeholder="Type your message" autocomplete="on"></textarea>
                            <input id="receiver_id" name="receiver_id" type="hidden"/>
                            <div class="form-control-position control-position-right">
                            <input id="upload" name="image" type="file"/>
                            <i class="ft-image" id="upload_link" onclick="toggleCheck()"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left col-3 m-0">
                            <button type="button" class="btn btn-info" id="sendMess"><i class="la la-paper-plane-o"></i> <span class="d-none d-lg-block"></span></button>
                        </fieldset>
                    </div>
                </form>
            </section>
            @elseif($checkIfBan->banned == 1)
                <div class="text-center mt-2">
                    <h3>This User has been suspended.</h3>
                </div>
            @else
                <div class="text-center mt-2">
                    <h3>You are no longer friends with this User.</h3>
                </div>
            @endif

        </div>
    </div>
</div>

<script src="{{ asset('app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}"></script>
<script>

        // $(document).ready(function () {
        //     .create( document.querySelector( '#editor' ), {
        //         toolbar: [ 'bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList' ]
        //     } )
        //     .catch( error => {
        //         console.log( error );
        //     } );

        // });

        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: []
        } )
        .then( editor => {            
            myEditor = editor;                        
        } )
        .catch( error => {
            console.error( error );
        } );
        
        function toggleCheck(){
            $('#category-img-tag').toggleClass('hidden');
        }

    $(function(){
        $("#upload_link").on('click', function(e){
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload").change(function(){
        readURL(this);
    });

</script>