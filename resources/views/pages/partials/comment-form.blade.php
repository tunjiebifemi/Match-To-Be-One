@if (Auth::user())
    <div class="card-content container">
        <div class="card-header border-0 pb-0">
            <div class="card-title mb-2">
                <h5 class="crt-acc"><b>Add your comment</b></h5>
            </div> 
        </div>           
        <form class="form" method="POST" action="{{route('threadcomment.store',$post->id)}}">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea id="" rows="5" class="form-control editor" name="comment" placeholder="Add your comment"></textarea>
                        </div>
                    </div>
                
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-orange">Submit Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif