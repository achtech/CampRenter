@extends('frontend.layout.layout_panel',['activePage'=>'FC_message'])
@section('content')
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{trans('front.my_message')}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('messages') }}
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">

				<div class="messages-container margin-top-0">
					<div class="messages-headline">
						<h4>{{trans('front.inbox')}}</h4>
					</div>

					<div class="messages-inbox">

						<ul>
						@if(!empty($messages))
						@foreach($messages as $msg)
							<li class="{{$msg->status}}">
								<a href="{{route('frontend.clients.message.detail',$msg->id_bookings)}}">
									<div class="message-avatar">
										<img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->renter_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>

									<div class="message-by">
										<div class="message-by-headline">
											<h5>{{$msg->renter_id!=$idClient ? $msg->renter_name : $msg->owner_name}} @if(App\Http\Controllers\frontend\FC_messageController::getNotificationByRenter($msg->renter_id)>0) <i>{{trans('front.unread')}}</i> @endif</h5>
											<span>{{$msg->date_message}}</span>
										</div>
										<p>{{ Illuminate\Support\Str::limit($msg->message, 100)}}</p>
									</div>
								</a>
							</li>
						@endforeach
						@else
							<li>
								<div class="message-by">
									<p>{{trans('front.no_results')}}</p>
								</div>
							</li>
						@endif

						</ul>

					</div>
				</div>
			</div>

			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
