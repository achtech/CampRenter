@extends('frontend.layout.layout_panel',['activePage'=>'FC_review'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.menu_panel_review')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('reviews_feedback',$review->id_review) }}
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">












			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
