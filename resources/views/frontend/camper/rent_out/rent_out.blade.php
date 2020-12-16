
@extends('frontend.layout.layout_panel',['activePage'=>'rent_out','footerPage' => 'true'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>{{trans('front.create_camper')}}</h2>
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
		<div class="col-lg-12">
			<div id="add-listing">

				<!-- Section -->
				<div class="add-listing-section">

					<!-- Headline -->
					<div class="col-md-12">
						<div class="row">
							<div class="add-listing-headline">
								<h3>1. {{trans('front.witch_camper_type')}}</h3>
							</div>
						</div>
					</div>
					<form  action="{{route('frontend.camper.storePersonalData')}}" method="POST"  name="frm1">
					@csrf
						<div class="col-md-12">
							<div class="row" style="padding-left: 100px;">
								@foreach($categories as $category)
									<!-- Box -->
									<div class="col-md-2 alternative-imagebox"
										id="{{App\Http\Controllers\admin\CamperCategoryController::hasSubCategories($category->id) ? 'showSub' : 'category'}}">
										<a href="/rentOut/rentByCategory/{{$category->id}}" id="camper-categories">
										<input type="radio" style="display: none" name="camper_categories" id="{{$category->id}}"  >
										<input type="hidden" name="id_camper_categories" value="{{$selectedCategoryId}}" />
										<img style="max-width:52%; @if($category->id==$selectedCategoryId) outline:2px solid #38b6cd; @endif"
												src="{{asset('images')}}/camper_categories/{{$category->image}}"
												data-picture_id="{{$category->id}}" alt=""
												id="cat_{{$category->id}}"
												onclick="changeCatStyle({{$category->id}})">
											<h3 id="title_cat" style="margin-left:0px;">{{App\Http\Controllers\Controller::getLabelFromObject($category)}}</h4>
										</a>
									</div>
								@endforeach
							</div>
							@if(count($sub_categories) >0)
								<div class="row" id="sub_cat">
									<div class="add-listing-headline">
										<h3>{{trans('backend.menu_camper_sub_category')}}</h3>
									</div>
									<div class="row" style="padding-left: 100px;">
									@foreach($sub_categories as $sub_categories)
										<!-- Box -->
										<div class="col-md-2 alternative-imagebox" name="id_camper_sub_categories" id="{{$sub_categories->id}}">
											<a>
											<input type="radio" style="display: none" name="id_camper_sub_categories" id="{{$sub_categories->id}}">
											<input type="hidden" name="id_camper_sub_categories" value="" />
											<img style="max-width:52%;" src="{{asset('images')}}/camper_categories/{{$sub_categories->image}}" alt=""
											data-picture_sub_id="{{$sub_categories->id}}" alt=""
													id="subcat_{{$sub_categories->id}}"
													onclick="changeSubCatStyle({{$sub_categories->id}})">
												<h3 id="title_sub" style="margin-left:0px;">{{App\Http\Controllers\Controller::getLabelFromObject($sub_categories)}}</h4>
											</a>
										</div>
									@endforeach
									</div>
								</div>
							@endif
						</div>

					<!-- Headline -->
					<div class="col-md-12">
						<div class="row">
							<div class="add-listing-headline" style="margin-top: 65px;">
								<h3>2. {{trans('front.give_name')}}</h3>
							</div>
						</div>
					</div>

					<!-- Title -->
					<div class="col-md-12">
						<div class="row">
								<div class="col-md-12">
									<input type="text" id="camper_name" name="camper_name" required placeholder="My sweet Camper" value="{{$camper->camper_name}}">
									<h6>{{trans('front.still_can_change')}}</h6>
								</div>
						</div>
					</div>
					<!-- Title -->
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<input type="text" name="description" placeholder="" value="{{$camper->description_camper}}">
								<h6>{{trans('front.recommandation')}}</h6>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<div style="float: right;">
						@if($isValid)<div style="color:red"> please choose a category @endif
						<button type="submit" class="button" @if($isValid) disabled @endif>{{trans('front.apply')}} <i class="fa fa-check-circle"></i></button>

						</div>
					</div>

					</form>
				</div>
				<!-- Section / End -->
			</div>
		</div>
	</div>
</div>
<script>
function changeCatStyle(id){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var obj = <?php echo json_encode($categorieIds); ?>;
	var obj2 = <?php echo json_encode($subCategorieIds); ?>;

	$.ajax({
		url: '/rentOut/rentByCategory/'+id,
		type: 'get',
		data: {_token: CSRF_TOKEN},
		success: function(response){
			for( i =0;i<obj2.length;i++){
				document.getElementById('subcat_'+obj[i]).style.outline="none";
			}
			for( i =0;i<obj.length;i++){
				if(obj[i]==id){
					document.getElementById('cat_'+obj[i]).style.outline="2px solid #38b6cd";
				}else{
					document.getElementById('cat_'+obj[i]).style.outline="none";
				}
			}
		}
    });
}

function changeSubCatStyle(id){
	var obj = <?php echo json_encode($subCategorieIds); ?>;
	for( i =0;i<obj.length;i++){
		if(obj[i]==id){
			document.getElementById('subcat_'+obj[i]).style.outline="2px solid #38b6cd";
		}else{
			document.getElementById('subcat_'+obj[i]).style.outline="none";
		}
	}
}

$("img[data-picture_id]").click(function(e){
	//Set the value of the hidden input field
	$("input[name='id_camper_categories']").val($(this).data('picture_id'));
});

$("img[data-picture_sub_id]").click(function(e){
	//Set the value of the hidden input field
	$("input[name='id_camper_sub_categories']").val($(this).data('picture_sub_id'));
});

</script>
@endsection
