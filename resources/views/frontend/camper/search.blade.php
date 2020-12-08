
@extends('frontend.layout.layout',['activePage' => 'camperSearch', 'footerPage' => 'false'])
@section('content')
<!-- Content ================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content fs-container-padding" >
		<div class="fs-content">
			@include('frontend.camper.filter');
			<section class="listings-container margin-top-30">
				<!-- Sorting / Layout Switcher -->
				<div class="row fs-switcher">
					<div class="col-md-6">
						<!-- Showing Results -->
						<p class="showing-results">{{isset($campers) ? count($campers) : 0}} Results Found </p>
					</div>
				</div>
				<!-- Listings -->
				<div class="row fs-listings">
					@foreach($campers as $camper)
					<!-- Listing Item -->

					<div class="col-lg-6 col-md-12">
						<a href="{{route('frontend.camper.detail',$camper->id)}}"
							class="listing-item-container getbysrc1_{{$camper->id}}"
							data-marker-id="{{$camper->id}}">
							<div class="listing-item">
								<img   src="{{asset('images')}}/campers/{{$camper->image}}" alt="">
								@if($camper->availability==0)
									<div class="listing-badge now-close">{{trans('front.blocked')}}</div>
								@elseif($camper->availability==1)
									<div class="listing-badge now-closed">{{trans('front.reserved')}}</div>
								@else
									<div class="listing-badge now-open">{{trans('front.available')}}</div>
								@endif
								<div class="listing-item-content">
									<h3>{{$camper->camper_name}} <i class="verified-icon"></i></h3>
									<span>{{Illuminate\Support\Str::limit($camper->description_camper, 80)}}...</span></br>
									<span class="tag">{{App\Http\Controllers\Controller::getLabel("camper_categories", $camper->id_camper_categories)}}</span>
									<span class="tag" style="background: #ca353c !important;"
									onmouseenter="PrepareMarkers('{{$camper->position_x}}','{{$camper->position_y}}',0,event)"
									onmouseout="PrepareMarkers('{{$camper->position_x}}','{{$camper->position_y}}',1, event)">
									See in Map</span>
								</div>
								<!--<div id="book_fav">
									@if(!session('_client'))
										<span onclick="event.preventDefault();" class="like-icon"></span>
									@else
										<span onclick="event.preventDefault(); AddOrRemoveBookmarkSearch({{$camper->id}})"
											class="like-icon {{App\Http\Controllers\frontend\FC_bookmarkController::isBookmarked($camper->id)>0 ? 'liked' : ''}}">
										</span>
									@endif
								</div>-->
							</div>
							<div class="star-rating" data-rating="{{App\Http\Controllers\frontend\FC_reviewController::rateCamper($camper->id)}}">
								<div class="rating-counter">({{App\Http\Controllers\frontend\FC_reviewController::reviewCamperCount($camper->id)}} reviews)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->
					@endforeach
				</div>
				<!-- Listings Container / End -->
			</section>
		</div>
	</div>
	<div class="fs-inner-container map-fixed">
	@include('frontend.camper.search_map')
	</div>
</div>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	function AddOrRemoveBookmarkSearch(camper_id) {
		$.ajax({
                url: '/ajax/addBookmarks',
                type: 'post',
                data: {_token: CSRF_TOKEN,camperid: camper_id},
                success: function(response){
					$('#book_fav').load(location.href+(' #book_fav'));
                }
            });
	};

</script>



<script>


function PrepareMarkers(latup,longup,mouseOut, e){
	e.preventDefault();
	console.log(e);
	 sqh=mouseOut
	initMap(latup,longup,mouseOut) ;


}

function initMap(latup,longup,mouseOut) {


if(mouseOut==0){

 icontype="camper_icon2.png"
 }else{
  icontype="camper_icon.png"

}
  const iconBase = '{{asset('images')}}';
  const icons = {
	library: {
	  icon: iconBase+"/"+icontype,
	},
  };
  const features = [
	{
	  position: new google.maps.LatLng(
		latup,
		longup
	  ),
	  type: "library",
	},
  ];

  // Create markers.
  for (let i = 0; i < features.length; i++) {
	const marker = new google.maps.Marker({
	  position: features[i].position,
	  icon: icons[features[i].type].icon,
	  map: marefreshp,
	});
  }
}

</script>

@endsection
