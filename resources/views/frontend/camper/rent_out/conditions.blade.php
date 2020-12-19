
@extends('frontend.layout.layout_panel',['activePage'=>'conditions'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}}</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'conditions'])
		<form  action="{{route('frontend.camper.storecalendar')}}" method="POST">
		@csrf
			<div class="col-lg-7 col-md-12">
				<h3><strong>{{trans('front.terms')}}</strong></h3>
				<div class="col-md-12">
					<h4><strong>1. {{trans('front.minimal_rental_duration_prices')}}</strong></h4>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="col-md-12" style="margin-top:20px;">
							<p><strong>{{trans('front.main_season')}}:</strong>Jul. - Aug.</p>
						</div>
						<div class="col-md-12" style="margin-top:10px;">
							<div class="col-md-12" >
								<input id='price_main' type="text" name="{{$camper->price_per_day}}" placeholder="{{trans('front.price_per_night')}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-12">
								<h5>{{trans('front.minimal_rental_duration')}}</h5>
								<select id="main_season" class="" >
									<option value="0">Choose</option>
									<?php for ($i = 1; $i <= 14; $i++) {?>
										<option <?php echo $camper->minimal_rent_days_main == $i ? "selected='selected'" : null; ?> value="<?php echo $i; ?>"> <?php echo $i; ?> nights</option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-md-6" id="resultsrc" style="display:none;">

					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="col-md-12" style="margin-top:20px;">
							<p><strong>{{trans('front.off_season')}}:</strong>May - Jun. / Sep. - Oct.</p>
						</div>
						<div class="col-md-12" style="margin-top:10px;">
							<div class="col-md-12" >
								<input id='price_off' type="text" name="{{$camper->price_per_day}}" placeholder="{{trans('front.price_per_night')}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-12">
								<h5>{{trans('front.minimal_rental_duration')}}</h5>
								<select id="off_season" >
									<option value="0">Choose</option>
									<?php for ($i = 1; $i <= 14; $i++) {?>
										<option <?php echo $camper->minimal_rent_days_off == $i ? "selected='selected'" : null; ?> value="<?php echo $i; ?>"> <?php echo $i; ?> nights</option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="off_div" style="display:none;">

					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="col-md-12" style="margin-top:20px;">
							<p><strong>{{trans('front.winter_season')}}:</strong>Nov. - Apr.</p>
						</div>
						<div class="col-md-12" style="margin-top:10px;">
							<div class="col-md-12" >
								<input id='price_winter' type="text" name="{{$camper->price_per_day}}" placeholder="{{trans('front.price_per_night')}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-12">
								<h5>{{trans('front.minimal_rental_duration')}}</h5>
								<select id="winter_season" >
								<option value="0">Choose</option>
									<?php for ($i = 1; $i <= 14; $i++) {?>
										<option <?php echo $camper->minimal_rent_days_winter == $i ? "selected='selected'" : null; ?> value="<?php echo $i; ?>"> <?php echo $i; ?> nights</option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="winter_div" style="display:none;">

					</div>
				</div>
				<div class="col-md-12" style="margin-top:20px;">
					<h4><strong>1. {{trans('front.set_discounts')}}</strong></h4>
				</div>
				<div class="col-md-12" style="margin-top:20px;">
					<div class="col-md-3">
						<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
					</div>
					<div class="col-md-5">
						<p><strong>Last-minute discount</strong></p>
						<p style="font-size: 15px;line-height: 26px;">For bookings on short notice maximum 7 days before start of rental</p>
					</div>
					<div class="col-md-4">
						<p><strong>Last-minute discount</strong></p>
					</div>

				</div>
				<div class="col-md-12">
					<div class="col-md-3">
						<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
					</div>
					<div class="col-md-5">
						<p><strong>Long-trip discount</strong></p>
						<p style="font-size: 15px;line-height: 26px;">For bookings of 14 nights or more</p>
					</div>
					<div class="col-md-4">
						<p><strong>Long-trip discount</strong></p>
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
					<div style="float: right;">
					<a href="{{route('calendar')}}" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></a>
					<a href="{{route('accessories')}}" class="button border">{{trans('front.cancel')}}</a>
					</div>
				</div>
			</div>
		</form>
		<!-- Copyrights -->
		@include('frontend.layout.footer_panel')
	</div>
</div>

<script src="{{asset('js')}}/jquery.form.js"></script>
<script src="{{asset('js')}}/jquery.validate.min.js"></script>


<script>
	$('#main_season').on('change', function(){
		if($('#price_main').val() > 0){
			var base_url="{{ URL::to('/rentOut/calcule_main')}}"
			var price_main = $("#price_main").val();
			var current_night = this.value ;
			$.ajax({
				type: "POST",
				url: base_url,
				cache: false,
				dataType: 'html',
				data: {price_per_day:price_main, minimal_rent_days_main: current_night},

				success: function(res){
				r=res.trim();
				$("#resultsrc").show() ;
				$("#resultsrc").html(r);
					}
			});
		}
   })

   $('#off_season').on('change', function(){
		if($('#price_off').val() > 0){
			var base_url2="{{ URL::to('/rentOut/calcule_off')}}"
			var price_off = $("#price_off").val();
			var off_night = this.value ;
			$.ajax({
				type: "POST",
				url: base_url2,
				cache: false,
				dataType: 'html',
				data: {price_per_day:price_off, minimal_rent_days_off: off_night},

				success: function(res2){
				r2=res2.trim();
				$("#off_div").show() ;
				$("#off_div").html(r2);
					}
			});
		}
   })

   $('#winter_season').on('change', function(){
		if($('#price_winter').val() > 0){
			var base_url3="{{ URL::to('/rentOut/calcule_winter')}}"
			var price_winter = $("#price_winter").val();
			var winter_night = this.value ;
			$.ajax({
				type: "POST",
				url: base_url3,
				cache: false,
				dataType: 'html',
				data: {price_per_day:price_winter, minimal_rent_days_winter: winter_night},

				success: function(res3){
				r3=res3.trim();
				$("#winter_div").show() ;
				$("#winter_div").html(r3);
					}
			});
		}
   })

</script>


@endsection
