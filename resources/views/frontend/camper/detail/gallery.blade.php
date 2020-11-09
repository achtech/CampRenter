<h3 class="listing-desc-headline margin-top-70">Gallery</h3>
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
