<div class="dashboard-list-box margin-top-0">
    <h4>{{trans('front.visitor_reviews')}}</h4>
    <ul>
    @if($visitors != null)
        @foreach($visitors as $vis)
            <li>
                <div class="comments listing-reviews">
                    <ul>
                        <li>
                            <div class="avatar"><img src="@if(!empty($vis->photo)) {{asset('/images')}}/clients/{{$vis->photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>
                            <div class="comment-content"><div class="arrow-comment"></div>
                                <div class="comment-by">{{ $vis->name}} {{ $vis->last_name}} <div class="comment-by-listing"> on <a href="#">{{$vis->camper_name}}</a></div> 
                                <span class="date">{{date('j F Y', strtotime($vis->created_at))}}</span>
                                    <div class="star-rating" vis-rating="5"></div>
                                </div>
                                <p>{{$vis->comment}}</p>
                                <a href="/review/owner/feedback/{{$vis->id_review}}" class="rate-review "><i class="fas fa-undo"></i> Reply to this review</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        @endforeach
        @else
            <li>
                <div class="comments listing-reviews">
                    <ul>
                        <li>
                            <p>{{trans('front.no_results')}}</p>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</div>