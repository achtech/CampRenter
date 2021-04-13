@extends('frontend.layout.layout_panel',['activePage'=>'FC_wallet'])
@section('content')

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Wallet</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							{{ Breadcrumbs::render('wallets') }}
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content wallet-totals">
						<h4>{{App\Http\Controllers\admin\ClientController::getTotalsSolde($client->id)}}</h4>
						<span>{{ __('front.total_earning') }}
							<strong class="wallet-currency">CHF</strong></span></div>

				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content wallet-totals">
						<h4>{{App\Http\Controllers\admin\ClientController::getCurrentSolde($client->id)}}</h4>
						<span>{{ __('front.total_current_month') }}
							<strong class="wallet-currency">CHF</strong></span></div>

				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-6">
					<div class="dashboard-stat-content"><h4>{{ $total_orders ?? 0 }}</h4>
					 <span>{{ __('front.total_orders') }} </span></div>

				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-7">
					<div class="dashboard-stat-content"><h4>{{ $total_confirmed ? $total_confirmed->total : 0 }}</h4> <span>{{ __('front.confirmed_bookings') }} </span></div>

				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-5">
					<div class="dashboard-stat-content"><h4>{{ $total_canceled ? $total_canceled->total : 0 }}</h4> <span>{{ __('front.total_canceled') }} </span></div>

				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>{{ $total_rejected ? $total_rejected->total : 0 }}</h4> <span>{{ __('front.total_rejected') }} </span></div>

				</div>
			</div>

		</div>

		<div class="row">

			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>{{trans('front.earnings')}} <div class="comission-taken">{{trans('front.fee')}}: <strong>{{$activePromotion->commission}}%</strong></div></h4>
					@if(sizeof($owner_bookings) != 0)
					<ul style="height: 500px;overflow-y: auto;">
						@foreach($owner_bookings as $owner_booking)
						<li><i class="fas fa-caravan"></i>
							<strong>{{$owner_booking->camper_name}}</strong>
							<ul>
								<li class="paid">{{trans('front.net_earning')}}: <span>$ {{$owner_booking->netEaning}}</span></li>
								<li class="unpaid">Fee: {{$owner_booking->commission}}%</li>
								<li>{{trans('front.number_days')}}: {{$owner_booking->nbr_days}}</li>
								<li>{{trans('front.booking_date')}}: {{$owner_booking->created_date}}</li>
							</ul>
						</li>
						@endforeach
					</ul>
					@else
						<p style="display: inline-block;padding: 8px 0px 0px 11px;">{{trans('front.no_results')}}</p>
					@endif
				</div>
			</div>

			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>{{trans('front.billing_history')}}</h4>
					@if(sizeof($billings) != 0)
					<ul>
						@foreach($billings as $billing)
						<li><i class="list-box-icon fas fa-wallet"></i>
							<strong>${{ $billing->total}}</strong>
							<ul>
								@if($billing->status == 0)
								<li class="unpaid">{{trans('front.unpaid')}}</li>
								@else
								<li class="paid">{{trans('front.paid')}}</li>
								@endif
								<li>{{trans('front.payment_date')}}: {{ $billing->payment_date}}</li>
							</ul>
						</li>
						@endforeach
					</ul>
					@else
						<p style="display: inline-block;padding: 8px 0px 0px 11px;">{{trans('front.no_results')}}</p>
					@endif
				</div>
			</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
