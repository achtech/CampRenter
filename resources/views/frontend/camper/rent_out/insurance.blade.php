
@extends('frontend.layout.layout_panel',['activePage'=>'insurance_front'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{isset($camper) ? $camper->camper_name : ''}}</strong></h2>
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
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'insurance_front'])
		<div class="col-lg-7 col-md-12" style="padding-left: 37px;">
			<form  action="{{route('frontend.camper.storeRental_terms')}}" method="POST">
				@csrf
				<input type="hidden" name="id_campers" value="{{$camper->id}}" />
				<div class="col-lg-7 col-md-12">
					<h3><strong>{{trans('front.insurance')}}</strong></h3>
					<div class="payment-tab-trigger">
						<input id="vehicleowner" name="has_insurance" type="radio" value="0" onclick="show1();" @if($has_insurance == 0 || $has_insurance == null) ? checked : '' @endif>
						<label for="vehicleowner"><strong>{{trans('front.comprehensive_cover')}}</strong></label>
						<p>{{trans('front.comprehensive_cover_info')}}</p>
					</div>
					<div class="payment-tab-trigger">
						<input id="noinsurance" name="has_insurance" type="radio" value="1" onclick="show2();" @if($has_insurance == 1) ? checked : '' @endif>
						<label for="noinsurance"><strong>{{trans('front.our_proposition')}}</strong></label>
						<p>{{trans('front.no_insurance_info')}}</p>
					</div>
					<div id="div1" class="payment-tab-trigger" style="display: none; margin-top: 5%;">
						<div class="row">
							<div class="col-md-12">
								<p><strong>Prämienberechnung:</strong></p>
								@foreach($insurance as $item)
									@if($item->nbr_days_to!=null)
										<p><h5><strong>{{$item->nbr_days_from}} - {{$item->nbr_days_to}}</strong>
										@if($item->initial_price!=0) Fixprämie CHF {{$item->initial_price}},@endif CHF {{$item->price_per_day}} Pro Nacht</h5></p>
									@else
										<p><h5><strong>Ab {{$item->nbr_days_to}}</strong> @if($item->initial_price!=0) Fixprämie CHF {{$item->initial_price}},@endif CHF {{$item->price_per_day}} Pro Nacht</h5></p>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>

				<!-- Extras insurances -->
				@foreach($extra as $ext)
				<div class="col-lg-7 col-md-12 margin-bottom-30">
					<h3><strong>{{$ext->name}}</strong></h3>
					<div class="payment-tab-trigger">
						<input id="{{$ext->name}}_NO" name="{{$ext->name}}" type="radio" value="0" onclick="hide({{$loop->index}});" @if(!in_array($ext->name,$extraNames)) checked @endif>
						<label for="{{$ext->name}}_NO"><strong>{{trans('front.no')}}</strong></label>
					</div>
					<div class="payment-tab-trigger">
						<input id="{{str_replace(' ', '', $ext->name)}}_YES" name="{{$ext->name}}" type="radio" value="1" onclick="show({{$loop->index}});"  @if(in_array($ext->name,$extraNames))  checked @endif>
						<label for="{{str_replace(' ', '', $ext->name)}}_YES"><strong>{{trans('front.yes')}}</strong></label>
					</div>
					<div class="row">
						<div class="col-md-12" style="padding-left: 10%;">
							@foreach(App\Http\Controllers\frontend\FC_rentOutController::getSubExtra($ext->name) as $ext1)
								<div id="{{$loop->parent->index}}_{{$loop->index}}" class="payment-tab-trigger" style="display:none;">
									<input id="{{str_replace(' ', '', $ext->name)}}{{$ext1->sub_extra}}_YES" name="{{$ext->name}}_"
										type="radio" value="{{$ext1->sub_extra}}" onclick="showSubExtra({{$loop->parent->index}}, {{$loop->index}});"
										@if(in_array($ext->name.'_'.$ext1->sub_extra,$extraNames))  checked @endif
									>
									<label for="{{str_replace(' ', '', $ext->name)}}{{$ext1->sub_extra}}_YES"><strong>{{$ext1->sub_extra}}</strong></label>
								</div>
								<div id="_{{$loop->parent->index}}_{{$loop->index}}" class="payment-tab-trigger" style="display: none; margin-top: 5%;">
									<div class="row">
										<div class="col-md-12">
											<p><strong>Prämienberechnung:</strong></p>
											@foreach(App\Http\Controllers\frontend\FC_rentOutController::getSubExtraDatas($ext->name, $ext1->sub_extra) as $ext2)
												@if($ext2->nbr_days_to!=null)
													<p><h5><strong>{{$ext2->nbr_days_from}} - {{$ext2->nbr_days_to}}</strong>
													@if($ext2->initial_price!=0) Fixprämie CHF {{$ext2->initial_price}},@endif CHF {{$ext2->price_per_day}} Pro Nacht</h5></p>
												@else
													<p><h5><strong>Ab {{$ext2->nbr_days_from}}</strong> @if($ext2->initial_price!=0) Fixprämie CHF {{$ext2->initial_price}},@endif CHF {{$ext2->price_per_day}} Pro Nacht</h5></p>
												@endif
											@endforeach
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div id="{{$loop->index}}" class="payment-tab-trigger" style="display: none; margin-top: 5%;">
						<div class="row">
							<div class="col-md-12">
								<p><strong>Prämienberechnung:</strong></p>
								@foreach(App\Http\Controllers\frontend\FC_rentOutController::getExtraDatas($ext->name) as $ext2)
									@if($ext2->nbr_days_to!=null)
										<p><h5><strong>{{$ext2->nbr_days_from}} - {{$ext2->nbr_days_to}}</strong>
										@if($ext2->initial_price!=0) Fixprämie CHF {{$ext2->initial_price}},@endif CHF {{$ext2->price_per_day}} Pro Nacht</h5></p>
									@else
										<p><h5><strong>Ab {{$ext2->nbr_days_from}}</strong> @if($ext2->initial_price!=0) Fixprämie CHF {{$ext2->initial_price}},@endif CHF {{$ext2->price_per_day}} Pro Nacht</h5></p>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="col-md-12">
					<div style="float: right;">
						{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
						{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
					</div>
				</div>
			</form>
		</div>
	</div>

</div>

<script>
var extraNamesSelected = <?php echo json_encode($extra); ?>;
var names = [];
for(var i=0;i<extraNamesSelected.length;i++){
	var v1 = document.getElementById(extraNamesSelected[i].name.replace(/\s/g, '') + '_YES').checked;
	names[i] = extraNamesSelected[i].name;
	if(v1==true ){
		show(i);
	}
}

var subExtraNamesSelected = <?php echo json_encode($subExtraNames); ?>;
for(var i=0;i<subExtraNamesSelected.length;i++){
	var v1 = document.getElementById(subExtraNamesSelected[i].full_name.replace(/\s/g, '') + '_YES').checked;
	if(v1==true ){
		var outerId = names.indexOf(subExtraNamesSelected[i].name);
		showSubExtra(outerId, i);
	}
}

if(document.getElementById('noinsurance').checked){
	show2();
}

function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
function showSubExtra(outerId,id){
	hideSubExtra("_"+outerId);
	if(document.getElementById("_"+outerId+'_'+id) != undefined){
		document.getElementById("_"+outerId+'_'+id).style.display = 'block';
	}
}
function hideSubExtra(outerId){
	var newId = outerId+"_";
	subExtras = document.querySelectorAll('[id ^= "'+newId+'"]');
	Array.prototype.forEach.call(subExtras, hideSubExtras);
}

function hide(id){
	var newId = id+"_";
	hideSubExtra("_"+id);
	subExtras = document.querySelectorAll('[id ^= "'+newId+'"]');
	Array.prototype.forEach.call(subExtras, hideSubExtras);
	if(subExtras.length==0){
		document.getElementById(id).style.display ='none';
	}
}
function show(id){
	var newId = id+"_";
	subExtras = document.querySelectorAll('[id ^= "'+newId+'"]');
	Array.prototype.forEach.call(subExtras, showSubExtras);
	if(subExtras.length==0 && document.getElementById(id) != undefined){
		document.getElementById(id).style.display = 'block';
	}
}
function showSubExtras(element, iterator) {
	document.getElementById(element.id).style.display = 'block';
}
function hideSubExtras(element, iterator) {
	document.getElementById(element.id).style.display = 'none';
}

</script>
@endsection
