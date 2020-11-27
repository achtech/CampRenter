<h3 class="listing-desc-headline margin-top-70">{{trans('front.gallery')}}</h3>
<div class="listing-slider-small mfp-gallery-container margin-bottom-0">
    @foreach($galleries as $gal)
        <a
            href="{{asset('images')}}/gallery/{{$gal->image}}"
            data-background-image="{{asset('images')}}/gallery/{{$gal->image}}"
            class="item mfp-gallery"
            title="{{$gal->id}}">
        </a>
    @endforeach
</div>
@if(count($galleries)==0)
<div class="notification success">
    {{__('front.No data found')}}
</div>
@endif
