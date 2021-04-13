<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">{{trans('front.Reviews')}} <span>({{count($reviews)}})</span></h3>

<!-- Rating Overview -->
<div class="rating-overview">
    <div class="rating-overview-box">
        <span class="rating-overview-box-total">{{number_format($rateCamper,1)}}</span>
        <span class="rating-overview-box-percent">{{trans('front.out of')}} 5.0</span>
        <div class="star-rating" data-rating="5"></div>
    </div>

    <div class="rating-bars">
            <div class="rating-bars-item">
                <span class="rating-bars-name">{{trans('front.service')}} </span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating" data-rating="{{$rateDetail->ratingService ?? 0}}">
                        <span class="rating-bars-rating-inner"></span>
                    </span>
                    <strong>{{number_format($rateDetail->ratingService ?? 0,1)}}</strong>
                </span>
            </div>
            <div class="rating-bars-item">
                <span class="rating-bars-name">{{trans('front.managing')}} </span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating" data-rating="{{$rateDetail->ratingManaging ?? 0}}">
                        <span class="rating-bars-rating-inner"></span>
                    </span>
                    <strong>{{number_format($rateDetail->ratingManaging ?? 0,1)}}</strong>
                </span>
            </div>
            <div class="rating-bars-item">
                <span class="rating-bars-name">{{trans('front.cleanliness')}}</span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating" data-rating="{{$rateDetail->ratingCleanliness ?? 0}}">
                        <span class="rating-bars-rating-inner"></span>
                    </span>
                    <strong>{{number_format($rateDetail->ratingCleanliness ?? 0,1)}}</strong>
                </span>
            </div>
    </div>
</div>
<!-- Rating Overview / End -->


<div class="clearfix"></div>

<!-- Reviews -->
<section class="comments listing-reviews">
    <ul>
        @foreach($reviews as $review)
            <li>
                <div class="avatar" style="height: 60%;"><img style="height: 60%;" src="{{ $review->photo ? asset('public/images/clients').'/'.$review->photo : asset('/images/avatar/default.jpg')}}" alt="" /></div>
                <div class="comment-content"><div class="arrow-comment"></div>
                    <div class="comment-by">{{$review->name}} <span class="date">{{date('j F Y', strtotime($review->created_at))}}</span>
                        <div class="star-rating" data-rating="{{number_format(($review->rate_service+$review->rate_managing+$review->rate_cleanliness)/3),1}}"></div>
                    </div>
                    <p>{{$review->comment}}</p>
                    <!-- Book Now -->
                    @if(!session('_client'))
                    <a href="/showlogin/client" class="rate-review"><i class="far fa-thumbs-up"></i> {{trans('front.helpful_review')}} <span>{{$review->helpfulReview}}</span></a>
                    @else
                    <a href="{{route('frontend.clients.review.helpfulReview',$review->id)}}" class="rate-review"><i class="far fa-thumbs-up"></i> {{trans('front.helpful_review')}} <span>{{$review->helpfulReview}}</span></a>
                    @endif
                </div>
            </li>
        @endforeach

        </ul>
</section>
<div class="clearfix"></div>
<!-- Pagination / End -->
