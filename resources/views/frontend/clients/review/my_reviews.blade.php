<div class="dashboard-list-box margin-top-0">
    <h4>Your Reviews</h4>
    <ul>
        @if($owners != null)
            @foreach($owners as $own)
                <li>
                    <div class="comments listing-reviews">
                        <ul>
                            <li>
                                <div class="avatar"><img src="images/reviews-avatar.jpg" alt="" /> </div>
                                <div class="comment-content"><div class="arrow-comment"></div>
                                    <div class="comment-by">Your review <div class="comment-by-listing own-comment">on <a href="#">{{ $own->last_name}}'s Camper</a></div> <span class="date">
                                    {{date('j F Y', strtotime($own->created_at))}}</span>
                                        <div class="star-rating" data-rating="4.5"></div>
                                    </div>
                                    <p>{{$own->comment}}</p>
                                    <a href="/review/owner/edit/{{$own->id_review}}" class="rate-review"><i class="far fa-edit"></i> Edit</a>
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