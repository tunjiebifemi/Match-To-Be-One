@foreach($comments as $comment)
    <div class="display-comment">
        
        <p>{{ $comment->comment }}</p>
        <a href=""></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="commentable_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>
        @include('pages.partials.replies', ['comments' => $comment->replies])
    </div>
@endforeach 