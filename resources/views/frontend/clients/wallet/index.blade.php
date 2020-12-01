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
					<div class="dashboard-stat-content wallet-totals"><h4>
						{{App\Http\Controllers\frontend\FC_walletController::walletTotals($wallet_owner[0]->clt)}}</h4>
						<span>{{ __('front.total_earning') }}
							<strong class="wallet-currency">EUR</strong></span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content wallet-totals">
						<h4>{{App\Http\Controllers\frontend\FC_walletController::walletCurrentMonth($wallet_owner[0]->clt)}}</h4>
						<span>{{ __('front.total_current_month') }}
							<strong class="wallet-currency">EUR</strong></span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-5">
					<div class="dashboard-stat-content"><h4>3</h4> <span>{{ __('front.total_canceled') }} </span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-6">
					<div class="dashboard-stat-content"><h4>{{ $wallet_owner[0]->total}}</h4>
					 <span>{{ __('front.total_orders') }} </span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-7">
					<div class="dashboard-stat-content"><h4>3</h4> <span>{{ __('front.confirmed_bookings') }} </span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>3</h4> <span>{{ __('front.total_rejected') }} </span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>

		</div>

		<div class="row">

			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Earnings <div class="comission-taken">Fee: <strong>15%</strong></div></h4>
					<ul>

						<li><i class="fas fa-shopping-cart"></i>
							<strong>Sunway Apartment</strong>
							<ul>
								<li class="paid">$99.00</li>
								<li class="unpaid">Fee: $14.50</li>
								<li class="paid">Net Earning: <span>$84.50</span></li>
								<li>Order: #00124</li>
								<li>Date: 01/02/2019</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Payout History</h4>
					<ul>

						<li><i class="list-box-icon fas fa-wallet"></i>
							<strong>$84.50</strong>
							<ul>
								<li class="unpaid">Unpaid</li>
								<li>Period: 02/2019</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection
