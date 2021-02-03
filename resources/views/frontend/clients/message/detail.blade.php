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
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Messages</li>
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
						<h4></h4>
						<a href="#" class="message-action"></a>
					</div>

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<ul>
								@foreach($messages as $msg)
									<li class="@if($activeRenter == $msg->renter_id) active-message @endif">
										<a href="{{route('frontend.clients.message.detail',$msg->renter_id)}}">
											<div class="message-avatar"><img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->renter_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>

											<div class="message-by">
												<div class="message-by-headline">
													<h5>{{$msg->renter_name}} @if(App\Http\Controllers\frontend\FC_messageController::getNotificationByRenter($msg->renter_id)>0) <i>{{trans('front.unread')}}</i> @endif</h5>
												</div>
												<p>{{ Illuminate\Support\Str::limit($msg->message, 30)}} ...</p>
												<span style="color: #888;">{{date('j F Y', strtotime($msg->date_message))}}</span>
												<span style="float:right; color: #888;">{{date('h:m', strtotime($msg->date_message))}}</span>
											</div>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">
							@foreach($conversations as $conv)
								@if($conv->renter_id == $activeRenter)
									<div class="message-bubble">
										<div class="message-avatar"><img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->renter_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>
										<div class="message-text"><p>{{$conv->message}}</p></div>
									</div>
								@else
									<div class="message-bubble me">
									<div class="message-avatar"><img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->owner_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>
										<div class="message-text"><p>{{$conv->message}}</p></div>
									</div>
								@endif
							@endforeach

							@if($id_bookings>0)
								<!-- Reply Area -->
								<div class="clearfix"></div>
									<form method="POST" action="{{ route('frontend.chat.register_chat') }}">
										@csrf
										<input type="hidden" name="id_renters" value="{{$activeRenter}}" />

										<div class="message-reply">
											<textarea cols="40" rows="3" name="message" placeholder="{{trans('front.your_message')}}"></textarea>
											<button class="button" type="submit" >{{trans('front.send_message')}}</button>
										</div>
									</form>
								</div>
							@endif
						<!-- Message Content -->

					</div>

				</div>

			</div>

			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
