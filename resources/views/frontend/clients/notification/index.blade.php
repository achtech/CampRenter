@extends('frontend.layout.layout_panel',['activePage'=>'FC_notification'])
@section('content')
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Notification</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('notifications') }}
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
							@foreach($datas as $data)
							<li class="{{$data->status}}">
								<a href="#">									
									<div class="message-avatar">
										<img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" />
									</div>

									<div class="message-by">
										<div class="message-by-headline">
											<h5>{{ App\Http\Controllers\Controller::getClientName($data->id_renter)}} @if($data->status == "unread") <i>Unread</i> @endif</h5>
											<span>{{date('j F Y h:m:s', strtotime($data->created_at))}}</span>
										</div>
										<p>{{$data->message}}</p>
									</div>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content / End -->
@endsection
