
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
			<form id="inssurance_form" action="{{route('frontend.camper.storeRental_terms')}}" method="POST" onsubmit="return checkForm();">
				@csrf
				<input type="hidden" name="id_campers" value="{{$camper->id}}" />
				<div class="col-lg-12 col-md-12">
					<h2>{{trans('front.insurance')}}</h2>
					<div class="payment-tab-trigger">
						<input id="vehicleowner" name="has_insurance" type="radio" value="2" onclick="show1();" @if($has_insurance == 2 || $has_insurance == null) ? checked : '' @endif>
						<label for="vehicleowner"><strong>{{trans('front.comprehensive_cover')}}</strong></label>
						<p>{{trans('front.comprehensive_cover_info')}}</p>
					</div>
					<div id="div2" class="payment-tab-trigger" style="display: none;">
						<div class="checkboxes in-row">
							<input id="bonusverlust" type="checkbox" @if($has_insurance == 2 ) ? checked : '' @endif>
							<label for="bonusverlust" style="color: #ed0707;">{{trans('front.required_check_insurance')}}</label>
						</div>
						<div class="col-md-12 margin-top-30">
							<p><strong>{{trans('front.insurance_benefit')}} :</strong></p>
							<p>{{trans('front.insurance_benefit_title_1')}}</p>
							<p>
								<h5><strong>{{trans('front.liability')}}</strong></h5>
								<h5><strong>{{trans('front.collision_insurance')}}</strong></h5>
								<h5><strong>{{trans('front.partial_coverage')}}</strong></h5>
							</p>
							<p><h5>{{trans('front.damage_reported')}}</h5></p>
						</div>
					</div>
					<div class="payment-tab-trigger">
						<input id="noinsurance" name="has_insurance" type="radio" value="1" onclick="show2();" @if($has_insurance == 1) ? checked : '' @endif>
						<label for="noinsurance"><strong>{{trans('front.our_proposition')}}</strong></label>
						<p>{{trans('front.no_insurance_info')}}</p>
					</div>
					<div id="div1" class="payment-tab-trigger" style="display: none; margin-top: 5%;">
						<div class="col-md-12 margin-top-20">
									<table class="basic-table">
										<tr>
											<th>{{trans('front.tab_title_1')}}</th>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.liability')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.acceptance_bonus')}}</p></td>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.collision_insurance')}} {{trans('front.gross_negligence')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.Deductible')}} CHF 2'000</p></td>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.partial_coverage')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.Deductible')}} CHF 0</p></td>
										</tr>

									</table>
								</div>
								<div class="col-md-12 margin-top-20">
									<table class="basic-table">
										<tr>
											<th>{{trans('front.tab_title_2')}}</th>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.liability')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.acceptance_bonus')}}</p></td>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.collision_insurance')}} {{trans('front.gross_negligence')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.Deductible')}} CHF 500</p></td>
										</tr>

										<tr>
											<td data-label="Column 2"><strong>{{trans('front.partial_coverage')}}</strong></td>
										</tr>

										<tr>
											<td data-label="Column 2"><p>{{trans('front.Deductible')}} CHF 0</p></td>
										</tr>

									</table>
								</div>
					</div>
				</div>
				<div class="col-md-12">
					<h2>{{trans('front.compulsory_insurance')}}</h2><p>{{trans('front.compulsory_insurance_desc')}}</p>
				</div>

				<!-- Extras insurances -->
				@foreach($extra as $ext)
				@if($ext->name != "Insassenunfall")
					<div class="col-lg-7 col-md-12 margin-bottom-30">
							<h3><strong>{{$ext->name}}</strong></h3>
							@if($ext->name == "Assistance")
								<p>{{trans('front.assistance_desc')}}</p>
							@elseif($ext->name == "Innenraumversicherung")
								<p>{{trans('front.indoor_insurance_desc')}}</p>
							@endif
								<div class="payment-tab-trigger">
									<input id="{{$ext->name}}_NO" name="{{$ext->name}}" type="radio" value="0" onclick="hide({{$loop->index}});" @if(!in_array($ext->name,$extraNames)) checked @endif>
									<label for="{{$ext->name}}_NO"><strong>{{trans('front.no')}}</strong></label>
								</div>
							<div class="payment-tab-trigger">
								<input id="{{str_replace(' ', '', $ext->name)}}_YES" name="{{$ext->name}}" type="radio" value="1" onclick="show({{$loop->index}});"  @if(in_array($ext->name,$extraNames))  checked @endif>
								<label for="{{str_replace(' ', '', $ext->name)}}_YES"><strong>{{trans('front.yes')}}</strong></label>
							</div>
					</div>
				@endif
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
	var v = document.getElementById(extraNamesSelected[i].name.replace(/\s/g, '') + '_YES');
	v1 = v != undefined ? v.checked : false;
	names[i] = extraNamesSelected[i].name;
	if(v1==true ){
		show(i);
	}
}

var subExtraNamesSelected = <?php echo json_encode($subExtraNames); ?>;
for(var i=0;i<subExtraNamesSelected.length;i++){
	var v1 = document.getElementById(subExtraNamesSelected[i].full_name.replace(/\s/g, '') + '_YES');
	v1 = v != undefined ? v.checked : false;
	if(v1==true ){
		var outerId = names.indexOf(subExtraNamesSelected[i].name);
		showSubExtra(outerId, i);
	}
}

if(document.getElementById('vehicleowner').checked){
	show1();
}

if(document.getElementById('noinsurance').checked){
	show2();
}

function checkForm()
  {
	var form = document.getElementById('inssurance_form');
	if(!form.bonusverlust.checked && document.getElementById('vehicleowner').checked) {
      alert("{{trans('front.alert_insurance')}}");
      form.bonusverlust.focus();
      return false;
    }
    return true;
  }

function show1(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display ='block';


}
function show2(){
  document.getElementById('div1').style.display = 'block';
  document.getElementById('div2').style.display ='none';

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
	/** Hide plus and light */
	document.getElementById(element.id).style.display = 'none';
}
function hideSubExtras(element, iterator) {
	document.getElementById(element.id).style.display = 'none';
}

</script>
@endsection
