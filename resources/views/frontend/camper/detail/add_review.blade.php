<!-- Add Review -->
<h3 class="listing-desc-headline margin-bottom-10">Add Review</h3>
<p class="comment-notes">Your email address will not be published.</p>
{{ Form::open(['action'=>'App\Http\Controllers\frontend\FC_reviewController@addReview',
 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
<input type="hidden" name="id_campers" value="{{$camper->id}}" />
<!-- Subratings Container -->
<div class="sub-ratings-container">

    <!-- Subrating #1 -->
    <div class="add-sub-rating">
        <div class="sub-rating-title">{{trans('front.service')}} </div>
        <div class="sub-rating-stars">
            <!-- Leave Rating -->
            <div class="clearfix"></div>
            <div class="leave-rating">
                <input type="radio" name="rate_service" id="rating-1" value="5"/>
                <label for="rating-1" class="fa fa-star"></label>
                <input type="radio" name="rate_service" id="rating-2" value="4"/>
                <label for="rating-2" class="fa fa-star"></label>
                <input type="radio" name="rate_service" id="rating-3" value="3"/>
                <label for="rating-3" class="fa fa-star"></label>
                <input type="radio" name="rate_service" id="rating-4" value="2"/>
                <label for="rating-4" class="fa fa-star"></label>
                <input type="radio" name="rate_service" id="rating-5" value="1"/>
                <label for="rating-5" class="fa fa-star"></label>
            </div>
        </div>
    </div>

    <!-- Subrating #2 -->
    <div class="add-sub-rating">
        <div class="sub-rating-title">{{trans('front.managing')}} </div>
        <div class="sub-rating-stars">
            <!-- Leave Rating -->
            <div class="clearfix"></div>
            <div class="leave-rating">
                <input type="radio" name="rate_managing" id="rating-11" value="5"/>
                <label for="rating-11" class="fa fa-star"></label>
                <input type="radio" name="rate_managing" id="rating-12" value="4"/>
                <label for="rating-12" class="fa fa-star"></label>
                <input type="radio" name="rate_managing" id="rating-13" value="3"/>
                <label for="rating-13" class="fa fa-star"></label>
                <input type="radio" name="rate_managing" id="rating-14" value="2"/>
                <label for="rating-14" class="fa fa-star"></label>
                <input type="radio" name="rate_managing" id="rating-15" value="1"/>
                <label for="rating-15" class="fa fa-star"></label>
            </div>
        </div>
    </div>

    <!-- Subrating #3 -->
    <div class="add-sub-rating">
        <div class="sub-rating-title">{{trans('front.cleanliness')}} </div>
        <div class="sub-rating-stars">
            <!-- Leave Rating -->
            <div class="clearfix"></div>
            <div class="leave-rating">
                <input type="radio" name="rate_cleanliness" id="rating-21" value="5"/>
                <label for="rating-21" class="fa fa-star"></label>
                <input type="radio" name="rate_cleanliness" id="rating-22" value="4"/>
                <label for="rating-22" class="fa fa-star"></label>
                <input type="radio" name="rate_cleanliness" id="rating-23" value="3"/>
                <label for="rating-23" class="fa fa-star"></label>
                <input type="radio" name="rate_cleanliness" id="rating-24" value="2"/>
                <label for="rating-24" class="fa fa-star"></label>
                <input type="radio" name="rate_cleanliness" id="rating-25" value="1"/>
                <label for="rating-25" class="fa fa-star"></label>
            </div>
        </div>
    </div>

</div>
<!-- Subratings Container / End -->
<!-- Review Comment -->
<div id="add-comment" class="add-comment">
    <fieldset>

        <div class="row">
            <div class="col-md-6">
                <label>{{trans('front.Name')}}:</label>
                <input type="text" name="name" value=""/>
            </div>

            <div class="col-md-6">
                <label>{{trans('front.Email')}}:</label>
                <input type="text" name="email" value=""/>
            </div>
        </div>

        <div>
            <label>{{trans('front.profil_review')}}:</label>
            <textarea cols="40" rows="3" name="comment" ></textarea>
        </div>

    </fieldset>

    <button class="button">{{trans('front.submit_review')}}</button>
    <div class="clearfix"></div>
</div>
</form>
