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
										<a href="{{route('frontend.clients.message.detail',$msg->id_bookings)}}">
											<div class="message-avatar"><img src="@if(!empty($msg->renter_photo)) {{asset('/images')}}/clients/{{$msg->renter_photo}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>

											<div class="message-by">
												<div class="message-by-headline">
													<h5>{{$msg->renter_id!=$idClient ? $msg->renter_name : $msg->owner_name}} @if(App\Http\Controllers\frontend\FC_messageController::getNotificationByRenter($msg->renter_id)>0) <i>{{trans('front.unread')}}</i> @endif</h5>
												</div>
												<p>{{ Illuminate\Support\Str::limit($msg->message, 30)}} ...</p>
												<span style="color: #888;">{{date('j m Y', strtotime($msg->date_message))}}</span>
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
							<div class="content-message">
								@foreach($conversations as $conv)
									@if(($conv->renter_id != $idClient && $conv->sender=="renter") || ($conv->owner_id != $idClient && $conv->sender=="owner"))
										<div class="message-bubble" @if($loop->index==count($conversations)-3) id="myAnchor" @endif>
											<div class="message-avatar">
											@php($firstPhoto = $conv->renter_id != $idClient && $conv->sender=="renter" ? $conv->renter_photo : $conv->owner_photo)
											<img src="@if(!empty($firstPhoto)) {{asset('/images')}}/clients/{{$firstPhoto}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>
											<div class="message-text"><p>{{$conv->message}}</p></div>
										</div>
									@else
										<div class="message-bubble me" @if($loop->index==count($conversations)-3) id="myAnchor" @endif>
										<div class="message-avatar">
										@php($secondPhoto = $conv->renter_id == $idClient && $conv->sender=="renter" ? $conv->renter_photo : $conv->owner_photo)
										<img src="@if(!empty($secondPhoto)) {{asset('/images')}}/clients/{{$secondPhoto}} @else http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=70 @endif" alt="" /></div>
											<div class="message-text"><p>{{$conv->message}}</p></div>
										</div>
									@endif
								@endforeach
							</div>

							@if(isset($id_bookings) && !empty($id_bookings) && $id_bookings>0)
								<!-- Reply Area -->
								<div class="clearfix"></div>
									<form method="POST" action="{{ route('frontend.chat.register_chat') }}">
										@csrf
										<input type="hidden" name="id_renters" value="{{$activeRenter}}" />
										<input type="hidden" name="id_owners" value="{{$activeOwner}}" />
										<input type="hidden" name="id_bookings" value="{{$id_bookings}}" />

										<div class="message-reply">
											<textarea cols="40" rows="3" name="message" id="message_content" placeholder="{{trans('front.your_message')}}"></textarea>
											<button class="button"id="message_btn" type="submit" >{{trans('front.send_message')}}</button>
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
	<script>
		$("#message_btn").prop("disabled",true);
		$("#message_btn").css("cursor","default");
		window.location.href = "#myAnchor";
		$('#message_content').on('keyup', function(){
			var txt = $('#message_content').val();
			if(txt!=''){
			$("#message_btn").css("cursor","pointer");
				$("#message_btn").prop("disabled",false);
			}else{
				$("#message_btn").prop("disabled",true);
				$("#btnRequest").css("cursor","default");

			}
		});
	</script>
	<style>
	.content-message {
		height:150px;
		overflow-y: scroll;
		}
</style>
@endsection
