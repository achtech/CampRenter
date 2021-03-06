@extends('frontend.layout.layout_panel',['activePage'=>'FC_profile'])
@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{ __('front.my_profile') }}</h2>
					@if(Session::has('danger'))
						<div class="danger">
							{{ Session::get('danger') }}
						</div>
					@endif

					@if(Session::has('warning'))
						<div class="warning">
							{{ Session::get('warning') }}
						</div>
					@endif

					@if(Session::has('success'))
						<div class="success">
							{{ Session::get('success') }}
						</div>
					@endif
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('profil') }}
						</ul>
					</nav>
				</div>
			</div>
		</div>
		{{ Form::open(['route'=>'frontend.client.updateData','enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
			@csrf

			<div class="row">
				<div class="col-lg-6 col-md-12" >
					@include('frontend.clients.user.profil_detail')
				</div>
				<div class="col-lg-6 col-md-12" >
					@include('frontend.clients.user.account_holder')
				</div>
			</div>
			
			{{Form::submit(__('front.save_profile_changes'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
		{{ Form::close() }}

		@if($client->type_login == "forms")
			<div class="row" >
				@include('frontend.clients.user.change_password')
			</div>
		@endif

		@include('frontend.layout.footer_panel')

	</div>
	<!-- Content / End -->
<script>
	 function readProfileImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_image')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function readProfileCin(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_cin')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function readProfileDrivingLicence(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#client_driving_licence')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		$(".checked-avatars" ).prop("checked", true );
		$(".checked-language" ).prop("checked", true );
		$(".checked-where_you_see_us" ).prop("checked", true );
</script>
@endsection
