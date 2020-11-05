@foreach($comments as $comment)
<li>
    <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
        <div class="comment-content"><div class="arrow-comment"></div>
        <div class="comment-by">{{$comment->name}}<span class="date">{{date('j F Y', strtotime($comment->created_at))}}</span></div>
        <p>{{$comment->comment}}</p>
        <form method="post" action="{{ route('frontend.blog.storeComment') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="id_blogs" value="{{ $comment->id_blogs }}" />
            <input type="hidden" name="id_parent" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Answer" />
        </div>
        </form>
    </div>

    <ul>
      @include('frontend.blog.comment', ['comments' => App\Http\Controllers\frontend\FBlogController::getChildComments($comment->id)])
    
    </ul>
</li>
@endforeach 

