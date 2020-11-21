@extends('frontend.layout.layout_panel',['activePage'=>'FC_message'])
@section('content')
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Messages</h2>
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
						<h4>Inbox</h4>
					</div>

					<div class="messages-inbox">

						<ul>
						@foreach($messages as $msg)
							<li class="{{$msg->status}}">
								<a href="{{route('frontend.clients.message.detail',$msg->renter_id)}}">
									<div class="message-avatar">
										<img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->renter_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>

									<div class="message-by">
										<div class="message-by-headline">
											<h5>{{$msg->renter_name}} @if($msg->status=="unread") <i>Unread</i> @endif</h5>
											<span>{{$msg->date_message}}</span>
										</div>
										<p>{{ Illuminate\Support\Str::limit($msg->message, 100)}}</p>
									</div>
								</a>
							</li>
						@endforeach
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
